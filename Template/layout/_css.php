<?php
/*
 backColor
 backColor_b
 mainFontColor
 alert
 fontColor
 headerFontColor
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
.table-list-header a:hover,.table-list-header a:focus {
	color:#767676
	}
.table-list-header .table-list-header-count {
	color:#ced4d1;
	}
.table-list-row .table-list-title a {
	color:<?= $customizer['fontColor'] ?>;
	}
.table-list-row .table-list-details {
	color:#f7f7f7;
	}
.table-list-row .table-list-details strong {
	color:#f7f7f7;
	}
.table-list-row .table-list-icons a:hover {
	color:<?= $customizer['fontColor'] ?>;
	}
.table-list-row .table-list-icons a:hover i {
	color:<?= $customizer['fontColor'] ?>;
	}
.table-list-category {
	color:#000;
	}
.table-list-category a {
	color:#000
	}
.table-list-category a:hover {
	color:<?= $customizer['mainFontColor'] ?>;
	}
input[type="number"],input[type="date"],input[type="email"],input[type="password"],input[type="text"]:not(.input-addon-field) {
	color: #fff;
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
	border-color:rgba(82,168,236,0.8);
	}
textarea:focus {
	color:#fff;
	border-color:rgba(82,168,236,0.8);
	}
textarea {
	color: #fff;
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
    color:#eee;
	}
.select2-container--default .select2-selection--multiple .select2-selection__choice {
    background-color: #3b3e47;
	}
.form-required {
	color:red;
	}
.form-errors {
	color:#b94a48;
	}
.form-help {
	color: #00c9ff;
	}
.reset-password a {
	color:#999
	}
.input-addon-field {
	color:<?= $customizer['fontColor'] ?>;
	}
.input-addon-item {
	background-color:rgba(147,128,108,0.1);
	color:#666;
	}
.icon-success {
	color:#468847
	}
.icon-error {
	color:#b94a48
	}
.alert {
	color:#fff;
	background-color:<?= $customizer['alert'] ?>;
	}
.alert-success {
	color: #ffffff;
    background-color: <?= $customizer['alert'] ?>;
    border-color: <?= $customizer['alert'] ?>;
	}
.alert-error {
	color:#b94a48;
	background-color:#f2dede;
	border-color:#eed3d7
	}
.alert-info {
	color:#3a87ad;
	background-color:#d9edf7;
	border-color:#bce8f1
	}
.alert-normal {
	color:<?= $customizer['fontColor'] ?>;
	background-color:#f0f0f0;
	border-color:#ddd
	}
.btn {
	color:#5c5c5c
	}
.btn:hover,.btn:focus {
	border-color:#bbb;
	color:#000
	}
.btn-red {
	border-color:#b0281a;
	color:#fff
	}
.btn-red:hover,.btn-red:focus {
	border-color:#b0281a;
	color:#fff
	}
.btn-blue {
	border-color:#188ae2;
	color:#fff
	}
.btn-blue:hover,.btn-blue:focus {
	border-color:#1475bf;
	color:#fff
	}
.btn:disabled {
	color:#ccc;
	border-color:#ccc;
	}
.tooltip .fa-info-circle {
	color:#999
	}
ul.dropdown-submenu-open {
	background-color:#fff;
	}
.dropdown-submenu-open li:not(.no-hover):hover {
	color:#fff
	}
.dropdown-submenu-open li:hover a {
	color:#fff;
	}
.dropdown-submenu-open a {
	color:#3b3e47;
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
td a.dropdown-menu:hover strong {
	color:#555
	}
td a.dropdown-menu:hover strong i {
	color:#555
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
.accordion-toggle:hover {
	color:#999
	}
.select2-container--default .select2-selection--single {
    background-color: #3b4658;
	}
.select2-container--default .select2-selection--single .select2-selection__rendered {
    color: #fff;
	}
.select2-container--default .select2-results__option--highlighted[aria-selected] {
    background-color: #3b4658;
    color: white;
	}
.select2-container--default .select2-results>.select2-results__options {
    background-color: #3b4658;
	}
.select2-container--default .select2-results__option[aria-selected="true"] {
    background-color: #4e5663!important;
    color: #fff!important;
	}
.select-dropdown-menu-item {
	color:<?= $customizer['fontColor'] ?>;
	}
.select-dropdown-menu-item.active {
	color:#fff;
	}
.select-dropdown-input-container {
	background-color:#fff
	}
.select-dropdown-input-container .select-dropdown-chevron {
	color:#555;
	}
.select-dropdown-input-container .select-loading-icon {
	color:#555;
	}
.suggest-menu-item {
	color:<?= $customizer['fontColor'] ?>;
	}
.suggest-menu-item.active {
	color:#fff;
	}
.suggest-menu-item.active small {
	color:#fff
	}
.suggest-menu-item small {
	color:#999;
	}
#modal-close-button {
	color:<?= $customizer['fontColor'] ?>;
	}
#modal-close-button:hover {
	color:#b94a48
	}
.header h2 {
  color:<?= $customizer['fontColor'] ?>;
	}
a i.web-notification-icon {
	color: <?= $customizer['mainFontColor'] ?>;
	}
a i.web-notification-icon:focus,a i.web-notification-icon:hover {
	color:#000
	}
.logo a {
	color:#d40000;
	}
.logo span {
	color:<?= $customizer['fontColor'] ?>;
	}
.logo a:hover {
	color:<?= $customizer['fontColor'] ?>;
	}
.logo a:focus span,.logo a:hover span {
	color:#d40000
	}
.page-header h2 a {
	color:<?= $customizer['fontColor'] ?>;
	}
.page-header h2 a:focus,.page-header h2 a:hover {
	color:#999
	}
.page-header li.active a {
	color:<?= $customizer['fontColor'] ?>;
	}
.menu-inline li .active a {
	color:#000;
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
.sidebar-icons>ul li:hover,.sidebar-icons>ul li.active {
	background-color: #3b404b;
	}
.sidebar>ul li.active a:focus,.sidebar>ul li.active a:hover {
	color:<?= $customizer['fontColor'] ?>;
	}
.avatar-letter {
	color:#fff;
	}
#file-dropzone-inner,#screenshot-inner {
	color:#aaa
	}
#file-list li .file-error {
	color:#b94a48
	}
.file-thumbnail-title {
	color:#555;
	}
.file-thumbnail-description {
	color:#999;
	}
.action-menu {
	color:<?= $customizer['fontColor'] ?>;
	}
.project-overview-column small {
	color:#e5e5e5
	}
.project-overview-column strong {
	color:#eee;
	}
.views li.active a {
	color: <?= $customizer['mainFontColor'] ?>;
	}
.views a {
	color:<?= $customizer['fontColor'] ?>;
	}
.views a:hover {
	color:#fff;
	}
.dashboard-project-stats small {
	color:#999
	}
.dashboard-table-link {
	color:#000;
	}
.dashboard-table-link:focus,.dashboard-table-link:hover {
	color:#999
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
.board-column-header-task-count {
	color:#999;
	}
a.board-swimlane-toggle:hover,a.board-swimlane-toggle:focus {
	color:#000;
	}
.board-task-list-limit {
	background-color:#DF5353
	}
.task-board {
	background-color:#29303e!important;
	}
.task-board a {
	color:<?= $customizer['mainFontColor'] ?>;
	}
.task-board-saving-icon {
	color:#000
	}
.task-list-avatars .task-avatar-assignee {
	color:#999
	}
.task-list-avatars:hover .task-avatar-assignee {
	color:#000
	}
.task-board-icons a:hover,.task-list-icons a:hover {
	color:<?= $customizer['fontColor'] ?>;
	}
.task-board-icons a:hover i,.task-list-icons a:hover i {
	color:<?= $customizer['fontColor'] ?>;
	}
.task-board-icons .flag-milestone,.task-list-icons .flag-milestone {
	color:green
	}
.task-board-icons span {
	color:#97d2ff;
	}
.task-list-icons a,.task-list-icons span,.task-list-icons i {
	color:#999;
	}
.task-board span.task-icon-age-total,.task-board span.task-icon-age-column {
	border-color:#666
	}
.task-board-category {
	color:#000;
	}
.task-date {
	color:#000
	}
span.task-date-today {
	color:<?= $customizer['mainFontColor'] ?>;
	}
span.task-date-overdue {
	color:#b94a48
	}
.task-tags li {
	color:<?= $customizer['fontColor'] ?>;
	}
.select2-container--default .select2-results__option[aria-selected="true"] {
    background-color: #e5e5e5;
    color: #333;
	}
.task-list-tag {
	border-color:<?= $customizer['alert'] ?>;
	}
#task-summary h2 {
	color:#f7f7f7;
	}
.task-summary-container {
	background-color:#29303e!important;
	}
.task-summary-column {
	color:<?= $customizer['fontColor'] ?>;
	}
.task-summary-column span {
	color:#ced4cb
	}
.comment-sorting a {
	color:#f7f7f7;
	}
.comment-sorting a:hover {
	color:#999
	}
.comment-date {
	color:#999;
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
.task-links-task-count {
	color:#999;
	}
.text-editor a {
	color:#999;
	}
.text-editor a:hover {
	color:<?= $customizer['mainFontColor'] ?>;
	}
.markdown pre {
	color:#555
	}
.documentation {
	color:#555
	}
.panel {
	color:<?= $customizer['fontColor'] ?>;
	background-color:<?= $customizer['backColor_b'] ?>;
	}
.activity-date {
	color:#999
	}
.activity-title {
	color:<?= $customizer['fontColor'] ?>;
	}
.activity-description {
	color:#f7f7f7;
	}
.user-mention-link {
	color:#5897fb;
	}
.user-mention-link:hover {
	color:#fff
	}
.image-slideshow-overlay figcaption {
	color:#fff;
	}
.slideshow-icon {
	color:#fff;
	}
#backToTop i:before {
    color: #fff;
	}
