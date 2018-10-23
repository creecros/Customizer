<?php
/*
 backColor
 backColor_b
 mainFontColor
 alert
 fontColor
 headerFontColor
 color_a
*/

global $customizer; 
?>

<style>
body {
	color:<?= $customizer['fontColor'] ?>;
	background-color: <?= $customizer['backColor'] ?>;
	}
.select-dropdown-input-container {
    background-color: <?= $customizer['backColor_b'] ?>!important;
	}
a {
	color: <?= $customizer['mainFontColor'] ?>;
	}
a:focus {
	color:<?= $customizer['alert'] ?>;
	}
a:hover {
	color:<?= $customizer['fontColor'] ?>;
	}
a .fa {
	color:<?= $customizer['fontColor'] ?>;
	}
h1,h2,h3 {
	color:<?= $customizer['headerFontColor'] ?>;
	}
table th a {
	color:<?= $customizer['fontColor'] ?>;
	}
.draggable-row-handle {
	color: <?= $customizer['fontColor'] ?>;
	}
.draggable-row-handle:hover {
	color:<?= $customizer['fontColor'] ?>;
	}
.ui-widget-content {
    color: <?= $customizer['mainFontColor'] ?>;
	}
.table-list-header a {
	color:<?= $customizer['fontColor'] ?>;
	}
.table-list-row .table-list-title a {
	color:<?= $customizer['fontColor'] ?>;
	}
.table-list-row .table-list-icons a:hover {
	color:<?= $customizer['fontColor'] ?>;
	}
.table-list-row .table-list-icons a:hover i {
	color:<?= $customizer['fontColor'] ?>;
	}
.table-list-category a:hover {
	color:<?= $customizer['mainFontColor'] ?>;
	}
input[type="number"],input[type="date"],input[type="email"],input[type="password"],input[type="text"]:not(.input-addon-field) {
	background-color: <?= $customizer['backColor_b'] ?>;
	}
input[type="number"]::-webkit-input-placeholder,input[type="date"]::-webkit-input-placeholder,input[type="email"]::-webkit-input-placeholder,input[type="password"]::-webkit-input-placeholder,input[type="text"]:not(.input-addon-field)::-webkit-input-placeholder {
	color:<?= $customizer['backColor'] ?>;
	}
input[type="number"]::-moz-placeholder,input[type="date"]::-moz-placeholder,input[type="email"]::-moz-placeholder,input[type="password"]::-moz-placeholder,input[type="text"]:not(.input-addon-field)::-moz-placeholder {
	color:<?= $customizer['backColor'] ?>;
	}
input[type="number"]:-ms-input-placeholder,input[type="date"]:-ms-input-placeholder,input[type="email"]:-ms-input-placeholder,input[type="password"]:-ms-input-placeholder,input[type="text"]:not(.input-addon-field):-ms-input-placeholder {
	color:<?= $customizer['backColor'] ?>;
	}
input[type="number"]:focus,input[type="date"]:focus,input[type="email"]:focus,input[type="password"]:focus,input[type="text"]:focus {
	color:<?= $customizer['fontColor'] ?>;
	}
textarea {
	background-color: <?= $customizer['backColor_b'] ?>;
	}
textarea::-webkit-input-placeholder {
	color:<?= $customizer['backColor'] ?>;
	}
textarea::-moz-placeholder {
	color:<?= $customizer['backColor'] ?>;
	}
textarea:-ms-input-placeholder {
	color:<?= $customizer['backColor'] ?>;
	}
.select2-container--default .select2-selection--multiple .select2-selection__choice {
    background-color: <?= $customizer['color_a'] ?>;
	}
.input-addon-field {
	color:<?= $customizer['fontColor'] ?>;
	}
.alert {
	background-color:<?= $customizer['alert'] ?>;
	}
.alert-success {
    background-color: <?= $customizer['alert'] ?>;
    border-color: <?= $customizer['alert'] ?>;
	}
.alert-normal {
	color:<?= $customizer['fontColor'] ?>;
	}
.dropdown-submenu-open a {
	color:<?= $customizer['color_a'] ?>;
	}
.dropdown-menu-link-text,.dropdown-menu-link-icon {
	color:<?= $customizer['fontColor'] ?>;
	}
td a.dropdown-menu strong {
	color:<?= $customizer['fontColor'] ?>;
	}
td a.dropdown-menu strong i {
	color:<?= $customizer['fontColor'] ?>;
	}
td a.dropdown-menu i {
	color:<?= $customizer['fontColor'] ?>;
	}
td a.dropdown-menu:hover i {
	color:<?= $customizer['fontColor'] ?>;
	}
.accordion-toggle {
	color:<?= $customizer['fontColor'] ?>;
	}
.accordion-toggle:focus {
	color:<?= $customizer['fontColor'] ?>;
	}
.select2-container--default .select2-selection--single {
    background-color: <?= $customizer['color_a'] ?>;
	}
.select2-container--default .select2-results__option--highlighted[aria-selected] {
    background-color: <?= $customizer['color_a'] ?>;
	}
.select2-container--default .select2-results>.select2-results__options {
    background-color: <?= $customizer['color_a'] ?>;
	}
.select-dropdown-menu-item {
	color:<?= $customizer['fontColor'] ?>;
	}
.suggest-menu-item {
	color:<?= $customizer['fontColor'] ?>;
	}
#modal-close-button {
	color:<?= $customizer['fontColor'] ?>;
	}
.header h2 {
  color:<?= $customizer['fontColor'] ?>;
	}
a i.web-notification-icon {
	color: <?= $customizer['mainFontColor'] ?>;
	}
.logo span {
	color:<?= $customizer['fontColor'] ?>;
	}
.logo a:hover {
	color:<?= $customizer['fontColor'] ?>;
	}
.page-header h2 a {
	color:<?= $customizer['fontColor'] ?>;
	}
.page-header li.active a {
	color:<?= $customizer['fontColor'] ?>;
	}
.sidebar {
	background-color: <?= $customizer['backColor_b'] ?>;
	}
.sidebar>ul a {
	color:<?= $customizer['fontColor'] ?>;
	}
.sidebar>ul a:hover {
	color:<?= $customizer['fontColor'] ?>;
	}
.sidebar>ul li.active a {
	color:<?= $customizer['fontColor'] ?>;
	}
.sidebar>ul li.active a:focus,.sidebar>ul li.active a:hover {
	color:<?= $customizer['fontColor'] ?>;
	}
.action-menu {
	color:<?= $customizer['fontColor'] ?>;
	}
.views li.active a {
	color: <?= $customizer['mainFontColor'] ?>;
	}
.views a {
	color:<?= $customizer['fontColor'] ?>;
	}
td.board-column-task-collapsed {
	background-color:<?= $customizer['backColor'] ?>;
	}
.board-add-icon i {
	color:<?= $customizer['mainFontColor'] ?>;
	}
.board-add-icon i:focus,.board-add-icon i:hover {
	color:<?= $customizer['alert'] ?>;
	}
.task-board a {
	color:<?= $customizer['mainFontColor'] ?>;
	}
.task-board-icons a:hover,.task-list-icons a:hover {
	color:<?= $customizer['fontColor'] ?>;
	}
.task-board-icons a:hover i,.task-list-icons a:hover i {
	color:<?= $customizer['fontColor'] ?>;
	}
span.task-date-today {
	color:<?= $customizer['mainFontColor'] ?>;
	}
.task-tags li {
	color:<?= $customizer['fontColor'] ?>;
	}
.task-list-tag {
	border-color:<?= $customizer['alert'] ?>;
	}
.task-summary-column {
	color:<?= $customizer['fontColor'] ?>;
	}
.comments .comment-highlighted {
	background-color:<?= $customizer['backColor_b'] ?>;
	}
.comments .comment-highlighted:hover {
	background-color:<?= $customizer['backColor_b'] ?>;
	}
.subtask-cell a {
	color:<?= $customizer['fontColor'] ?>;
	}
.subtask-cell a:hover,.subtask-cell a:focus {
	color:<?= $customizer['mainFontColor'] ?>;
	}
.text-editor a:hover {
	color:<?= $customizer['mainFontColor'] ?>;
	}
.panel {
	color:<?= $customizer['fontColor'] ?>;
	background-color:<?= $customizer['backColor_b'] ?>;
	}
.activity-title {
	color:<?= $customizer['fontColor'] ?>;
	}
	
</style>

