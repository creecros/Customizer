/*r
ColorPickerCallback:cpC
element:r
hexInput:a
bgDiv1:b
bgDiv2:c
initIt:d
dColorContainer:e
appendSeparator:f
createColorDivs:g
stopPropagation:h
addColorElements:j
createElm:k

clrContainerEvtHdler_getSelectedColorAndThenUpdateInnerValues:m

createDropdownSpans:o


initColorPickerValues:s
setColorPickerInsideValues:t

rgbaInput:v
iRgbaRange:w
getParsedColors:x
r*/

/*
Knowledge:  1. backgound-color:none; color:none; are not a valid color.
            2. Convert rgba to similar hex color: https://stackoverflow.com/questions/15898740/how-to-convert-rgba-to-a-transparency-adjusted-hex
*/

/*! Menucool rgba Color Picker v2018.9.23. menucool.com/rgba-color-picker */
var MenuCoolRgbaColorPickerOptions = {
    initOnPageLoad: true
};

var rgbaColorPicker = (function (myOptions) {
    'use strict';
    // Private members    
    var addEvent = function (elem, evtType, func) {
        if (elem.addEventListener) {
            elem.addEventListener(evtType, func, false);
        } else if (elem.attachEvent) {
            elem.attachEvent("on" + evtType, func);
        }
        else {
            // for IE/Mac, NN4, and older
            elem["on" + evtType] = func;
        }
    };
    var classIsColor = function (myClass) {
        if (!myClass) return 0;
        var pattern = /\bcolor\b/;
        return pattern.test(myClass);
    };
    var len = "length";
    var documentCreateElement = function (tagName) {
        return document.createElement(tagName);
    };
    var hexToRgb = function (hex) {
        var retVal = 0;
        if (/^#([A-Fa-f0-9]{3}){1,2}$/.test(hex)) {
            var c = hex.substring(1).split('');
            if (c[len] == 3) {
                c = [c[0], c[0], c[1], c[1], c[2], c[2]];
            }
            c = '0x' + c.join('');
            retVal = [(c >> 16) & 255, (c >> 8) & 255, c & 255];
        }
        return retVal;
    };
    var hexAlphaToRgba = function (hex, alpha) {
        var retVal = hexToRgb(hex);
        return retVal ? 'rgba(' + retVal.join(',') + ',' + alpha + ')' : _invalid;
    };

    var rgbaToSimilarHex = function (rgba, bgHexColor) {
        var hex = '';
        var match = rgba.match(/rgba\((\d+),(\d+),(\d+),([.\d]+)/i);
        if (match) {
            var rgbBg = hexToRgb(bgHexColor);
            var rgbConverted = [];
            var alpha = +match[4];
            //now convert hex+alpha to similar hex. //rgba to similar rbg: Color = Color * alpha + Bkg * (1 - alpha);
            for (var i = 0; i < 3; i++) {
                rgbConverted.push(Math.floor(+match[i+1] * alpha + (+rgbBg[i]) * (1 - alpha)));
            }
            hex = rgbToHex(rgbConverted.join(','));
            //console.log(hex, rgba);
        }
        return hex;
    };

    var componentToHex = function (c) {
        var hex = c.toString(16).toUpperCase();
        return hex[len] == 1 ? "0" + hex : hex;
    };
    var rgbToHex = function (rgbStr) {
        var rgb = rgbStr.split(',');
        return "#" + componentToHex(+rgb[0]) + componentToHex(+rgb[1]) + componentToHex(+rgb[2]);
    };
    /* //jsfiddle.net/salman/f9Re3/
    var invertColor = function (color) {
        color = parseInt(color.substring(1), 16); // convert to integer
        color = 0xFFFFFF ^ color; // invert three bytes
        color = color.toString(16); // convert to hex
        color = "#" + ("000000" + color).slice(-6); // pad with leading zeros, also prepend #
        return color;
    };*/
    var validColorNumbers = function (nums) {
        var numArr = nums.split(',');
        for (var i = 0; i < numArr[len]; i++) {
            if (+numArr[i] < 0 || +numArr[i] > 255) return 0;
        }
        return 1;
    };

    var isiOS = (navigator.userAgent.match(/(iPad|iPhone|iPod)/g) ? true : false);

    var clickOrTouch = isiOS ? "touchstart" : "click";

    var clsNm = "className", sty = "style", bgClr = "backgroundColor", dspl = "display", val = "value", _invalid = "invalid", appendCld = "appendChild", trans = "transparent", undef = "undefined";

    var getStyle = function (elm) {
        if (window.getComputedStyle) //modern browsers
            var computedStyle = window.getComputedStyle(elm, null); //null can be replaced with pseudo such as 'hover'
        else if (elm.currentStyle) //IE
            computedStyle = elm.currentStyle;
        else
            computedStyle = elm[sty];

        return computedStyle;
    };

    var picker, //the picker instance
        HexInSession;//unconfirmed chosen hex color

    var btnOKClickHandler = function () {
        if (picker) {
            if (+picker.iRgbaRange[val] == 1)
                var color = picker.hexInput[val];
            else
                color = picker.rgbaInput[val];
            picker.R[picker.i][val] = color;
            picker.R[picker.i].onchange();
            picker.element[sty][dspl] = "none";
            if (typeof OnColorChanged !== "undefined") OnColorChanged(color, picker.R[picker.i].id);
        }
    };

    //Picker class constructor
    var Picker = function () {
        var that = this;
        that.hexInput =  //div elelment for displaying selected color as its text
        that.bgDiv1 = //div elelment for displaying selected color as its background
        that.bgDiv2 =
        that.dColorContainer = null; //div element containing colors
        that.i = -1; //current target index
        that.R = []; //target inputs that class contains "color"
        that.S = []; //span elements after the R target inputs: the chooser

        that.initIt();
    };

    Picker.prototype = {
        appendSeparator: function (div) {
            var sep = documentCreateElement("div");
            if (!div) {
                div = this.element;
                sep[clsNm] = "separator";
            }
            else
                sep[clsNm] = "clear";
            div[appendCld](sep);
        },

        createColorDivs: function (r, b, g) {
            var colorCell = documentCreateElement("div");
            if (r == "TT") {
                colorCell[clsNm] = "transChooser";
                colorCell.setAttribute("rgb", trans);
            }
            else {
                colorCell[sty][bgClr] = "#" + r + g + b;
                colorCell.setAttribute("rgb", "#" + r + g + b);
            }
            return colorCell;
        },

        stopPropagation: function (e) {
            e = e ? e : window.event;
            e.cancelBubble = true;
            if (e.stopPropagation) e.stopPropagation();
        },

        addColorElements: function () {
            var that = this;
            var colorCell;
            var div = that.dColorContainer;

            //add grayscales to div
            var grays = ["00", "11", "22", "33", "44", "55", "66", "77", "88", "99", "AA", "BB", "CC", "DD", "EE", "F6", "FF", "TT"];
            for (var a = 0; a < 18; a++) {
                colorCell = that.createColorDivs(grays[a], grays[a], grays[a]);
                div[appendCld](colorCell);
            }
            that.appendSeparator(div);

            //add colors to div (first group)
            var c = ["00", "33", "66", "99", "CC", "FF"];
            for (var b = 0; b < 6; b++) {
                for (var r = 0; r < 3; r++) {
                    for (var g = 0; g < 6; g++) {
                        colorCell = that.createColorDivs(c[r], c[g], c[b]);
                        div[appendCld](colorCell);
                    }
                }
                that.appendSeparator(div);
            }
            that.appendSeparator(div);

            //add colors to div (second group)
            for (var b = 0; b < 6; b++) {
                for (var r = 3; r < 6; r++) {
                    for (var g = 0; g < 6; g++) {
                        colorCell = that.createColorDivs(c[r], c[g], c[b]);
                        div[appendCld](colorCell);
                    }
                }
                that.appendSeparator(div);
            }
        },
        //type: null-div, 1-span, 2-input[type=text], 3-input[type=range], 4-button
        createElm: function (id, type) {
            var tagName;
            switch (type) {
                case 1:
                    tagName = "span";
                    break;
                case 2:
                case 3:
                    tagName = "input";
                    break;
                case 4:
                    tagName = "button";
                    break;
                default:
                    tagName = "div";
                    break;
            }
            var el = documentCreateElement(tagName);
            if (id[0] == '#')
                el.id = id.substring(1);
            else
                el[clsNm] = id;

            if (type == 2) {
                el.type = "text";
                el.setAttribute("spellcheck", "false");
            }
            else if (type == 3) {
                el.type = "range";
            }
            if (id != "#colorpicker" && id != "colorChooser")
                this.element[appendCld](el);
            return el;
        },

        initIt: function () {
            var that = this;
            // 1. create color picker
            that.element = that.createElm("#colorpicker");
            addEvent(that.element, clickOrTouch, that.stopPropagation);

            that.bgDiv1 = that.createElm("w1");
            that.bgDiv2 = that.createElm("w2");
            that.appendSeparator();//----------
            that.hexInput = that.createElm("w1", 2);
            that.rgbaInput = that.createElm("w2", 2);
            that.appendSeparator();//----------
            var btnOK = that.createElm("btnOK", 4);//it will float to right
            btnOK.setAttribute("type", "button");//avoid submitting form
            btnOK.innerHTML = "OK";
            var opacitySpan = that.createElm("opacitySpan", 1);
            opacitySpan.innerHTML = "Opacity";
            that.iRgbaRange = that.createElm("rgbaRange", 3);
            that.appendSeparator();//----------

            that.dColorContainer = that.createElm("#colorContainer");
            addEvent(that.dColorContainer, "mouseover", function (e) { that.clrContainerEvtHdler_getSelectedColorAndThenUpdateInnerValues(e, 1); });
            addEvent(that.dColorContainer, "mouseout", function (e) { that.clrContainerEvtHdler_getSelectedColorAndThenUpdateInnerValues(e, 2); });
            //The following eventType ==3 will also update HexInSession
            addEvent(that.dColorContainer, clickOrTouch, function (e) { that.clrContainerEvtHdler_getSelectedColorAndThenUpdateInnerValues(e, 3); });

            //that.iRgbaRange.type = "range";
            that.iRgbaRange[val] = 1;
            that.iRgbaRange.min = 0;
            that.iRgbaRange.max = 1;
            that.iRgbaRange.step = 0.1;
            addEvent(that.iRgbaRange, "input", function () { that.setColorPickerInsideValues(that.hexInput[val]); });


            // 2. populate color picker cells
            that.addColorElements();

            // 3. create spans after all class="color" elements, set popup events for them
            that.createDropdownSpans();

            // 4. click on body will hide the #colorpicker
            //I add this event to document.documentElement other than document.body as sometimes I clicked <html> instead of <body>
            addEvent(document.documentElement, clickOrTouch, function () { that.element[sty][dspl] = "none"; });
            addEvent(btnOK, clickOrTouch, btnOKClickHandler);

            //if (typeof OnColorPickerLoaded != undef) OnColorPickerLoaded();

        },

        clrContainerEvtHdler_getSelectedColorAndThenUpdateInnerValues: function (e, eventType) {
            if (eventType == 2) //mouseout of colorContainer
            {
                var selectedColor = HexInSession;
            }
            else{ //mouseover, or clickOrTouch
                if (e.target) var target = e.target; //recognized by all except IE
                else target = e.srcElement; //IE only knows srcElement. Chrome, Safari, Opera also knows it.
                if (target.id != "colorContainer"){
                    selectedColor = target.getAttribute("rgb");
                    if (eventType == 3) HexInSession = selectedColor;
                }
            }
            if(selectedColor)
                picker.setColorPickerInsideValues(selectedColor);
            //picker.stopPropagation(e);//don't need it anymore as we now have: addEvent(that.element, "click", that.stopPropagation);
        },

        // create choosers(span) after all class="color" elements, set popup events for them
        createDropdownSpans: function () {
            var colorInputs = document.getElementsByTagName("input");
            var that = this;
            for (var j = 0; j < colorInputs[len]; j++) {
                if (classIsColor(colorInputs[j][clsNm])) { //search all input element who has "color" class
                    var i = that.R[len];
                    that.R[i] = colorInputs[j]; //that.R.push(colorInputs); will make the R[i].parentNode throw exception
                    that.R[i].i = i;
                    //create choosers
                    that.S[i] = that.createElm("colorChooser", 1);
                    that.S[i].i = i;
                    that.S[i].id = colorInputs[j]['name'];

                    //that.S[i].arrow = that.createElm("colorChooserArrow", 1);
                    //that.S[i][appendCld](that.S[i].arrow);

                    that.R[i].parentNode.insertBefore(that.S[i], that.R[i].nextSibling);
                    that.S[i][sty][bgClr] = that.R[i][val];
                    addEvent(that.S[i], clickOrTouch, function (e) {
                        if (that.element.parentNode == this && that.element[sty][dspl] == "block") that.element[sty][dspl] = "none";
                        else {
                            that.i = this.i;
                            this[appendCld](that.element)[sty][dspl] = "block";
                            that.initColorPickerValues();
                        }
                        that.stopPropagation(e);
                    });
                        
                    //now we know what is S, so we can add the following event
                    that.R[i].onchange = function () {
                        that.S[this.i][sty][bgClr] = this[val];
                    };

                    if (typeof OnColorChanged !== "undefined") OnColorChanged(that.R[i][val], that.R[i].id);
                }
            }
        },


        //called by chooser click event handler: it will set values and BGs based on R[i][val]
        initColorPickerValues: function () {
            var that = this;
            var parsedColor = that.getParsedColors(that.R[that.i][val]);
            HexInSession = parsedColor[0];
            that.iRgbaRange[val] = parsedColor[len] == 2 ? parsedColor[1] : 1;
            if (HexInSession == _invalid) {
                that.bgDiv1[sty][bgClr] = that.bgDiv2[sty][bgClr] = trans;
                that.hexInput[val] = that.rgbaInput[val] = _invalid;
            }
            else
                that.setColorPickerInsideValues(HexInSession);

        },
        ///possible return values: [''], ['transparent'], ['invalid'], ['#......'], ['#......', num <=1]
        getParsedColors: function (color) { //,chooser
            color = color.replace(/\s+/g, '').toLowerCase();
            var retVal = [_invalid];
            if (!color || color == trans) {
                retVal = [color];
            }
            else if (color[0] == '#') {
                if (/^#([a-f0-9]{3}){1,2}$/.test(color)) {
                    retVal = [color];
                }
            }
            else if (/^rgba\(\d+,\d+,\d+,[\.\d]+\)$/.test(color)) {
                var match = color.match(/^rgba\((\d+,\d+,\d+),([\.\d]+)\)$/);
                if (match) {
                    if (validColorNumbers(match[1]) && +match[2] <= 1) {
                        retVal = [rgbToHex(match[1]), +match[2]];
                    }
                }
            }
            else if (/^rgb\(\d+,\d+,\d+\)$/.test(color)) {
                var match = color.match(/^rgb\((\d+,\d+,\d+)\)$/);
                if (validColorNumbers(match[1])) {
                    retVal = [rgbToHex(match[1])];
                }
            }
            else { //color name such as red, gray. Chrome will change bad name to 'rgba(0,0,0,0)', IE will be 'transparent'
                var testBox = this.bgDiv1; //chooser ? chooser : this.bgDiv1;
                testBox[sty][bgClr] = trans;//why having this line of code? It is a bug fix: If color is not a valid color, the next line won't change the previous color, and computedColor will still get the previous color. So we first change it to "transparent"
                testBox[sty][bgClr] = color;
                var computedColor = getStyle(testBox)[bgClr];

                //console.log("computedColor", computedColor, color, chooser);
                if (computedColor.indexOf('rgb(') != -1) {
                    retVal = [rgbToHex(computedColor.replace('rgb(', '').replace(')', ''))];
                }
            }
            return retVal;
        },

        //called by many events. It will update two inputs and two bg divs
        setColorPickerInsideValues: function (hex) {
            var alpha = +picker.iRgbaRange[val];
            picker.bgDiv1[sty][bgClr] = picker.hexInput[val] =  (hex && hex[0] == '#' ? hex.toUpperCase() : hex);
            picker.bgDiv2[sty][bgClr] = picker.rgbaInput[val] = (hex && hex[0] == '#' ? hexAlphaToRgba(hex, alpha) : hex);//the later hex will be (!hex || hex == 'transparent') 
        }
    };

    var buildPicker = function () {
        if (!picker) picker = new Picker();
        /*if (isiOS) {
            //stackoverflow.com/questions/17567344/detect-left-right-swipe-on-touch-devices-but-allow-up-down-scrolling
            //The following defines the touch event handlers for: fast click : 'fc', swipe horizontal: 'swh', swipe vertical: 'swv'
            (function (d) {
                var
                ce = function (e, n) { var a = document.createEvent("CustomEvent"); a.initCustomEvent(n, true, true, e.target); e.target.dispatchEvent(a); a = null; return false },
                nm = true, sp = { x: 0, y: 0 }, ep = { x: 0, y: 0 },
                touch = {
                    touchstart: function (e) { sp = { x: e.touches[0].pageX, y: e.touches[0].pageY } },
                    touchmove: function (e) { nm = false; ep = { x: e.touches[0].pageX, y: e.touches[0].pageY } },
                    touchend: function (e) { if (nm) { ce(e, 'fc') } else { var x = ep.x - sp.x, xr = Math.abs(x), y = ep.y - sp.y, yr = Math.abs(y); if (Math.max(xr, yr) > 20) { ce(e, (xr > yr ? 'swh' : 'swv')) } }; nm = true },
                    touchcancel: function (e) { nm = false }
                };
                for (var a in touch) { d.addEventListener(a, touch[a], false); }
            })(picker.element);
        }*/
    };

    if (myOptions.initOnPageLoad)
        addEvent(window, "load", buildPicker);

    return {
        //reload code below not work. Maybe the removed stuff is still there as it might be referenced somewhere else. So comment it out!
        //reload: function () {
        //    if (picker.S && picker.S.length) {
        //        console.log(picker.S.length);
        //        for (var i = 0; i < picker.S.length; i++) {
        //            picker.S[i].parentNode.removeChild(picker.S[i]);
        //            picker.S[i] = null;
        //        }
        //    }
        //    picker.R=picker.S=[];
        //    picker.createDropdownSpans();
        //},
        hexAlphaToRgba: hexAlphaToRgba, //(hex, alpha) such as hexAlphaToRgba("#DD9999", 0.5)
        rgbToHex: rgbToHex, //(rgbStr) such as rgbToHex("255,0,0")
        rgbaToHex: rgbaToSimilarHex, //(rgba, bgHexColor) such as rgbaToSimilarHex("rgba(255,0,0,0.2)", "#DD9999")
        init: buildPicker //when option is !MenuCool.cpInitOnLoad, you need to call init() manually when you are ready to populate color picker
    };
})(MenuCoolRgbaColorPickerOptions);

/*
ChangeSet #1 (2012-2-10): I use colorContainerEventDelegate to replace each color cell's onclick event. Greatly decreased the number of event listeners.
ChangeSet #2 (2012-2-10): Use stopPropagation instead of timer to fix the event bubbling to body that will hide the color picker.
ChangeSet #3 (2012-2-11): add if(target.id!="colorContainer") to fix the IE7 bug that the even responde to element "colorContainer".
ChangeSet #4 (2012-6-27): add to support Ajax by calling reload. Requested by Birger on 6.26 (check email)
ChangeSet #5 (2012-6-28): add transparent color to mcColorPicker. 
ChangeSet #6 (2012-8-30): Don't need the menucool link anymore.
ChangeSet #7 (2014-9-29): DOMContentLoaded instead of window.onload; added DOMContentLoaded handler
ChangeSet #8 (2014-10-27): If color fields are added quite late like my ddmenu skinBuilder, the buildPicker cannot run onDomReady or even window.onload. So I added option cpInitOnLoad and init() function.
ChangeSet #9 (2014-11-??): Click color chooser will toggle the display.
*/
