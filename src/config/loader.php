<?php

function loadModel($modelName) {
    require_once(MODEL_PATH . "/{$modelName}.php");
}

function loadView($viewName, $params = array()) {

    $viewData = $params;
    require_once(VIEW_PATH . "/{$viewName}.php");
}

function loadTemplateView($viewName, $params = array()) {

    $viewData = $params;
    require_once (TEMPLATE_PATH . "/header.php");
    require_once (TEMPLATE_PATH . "/left.php");
    require_once(VIEW_PATH . "/{$viewName}.php");
    require_once (TEMPLATE_PATH . "/footer.php");
}

function renderTitle ($title, $subTitle, $icon = null) {
    require_once (TEMPLATE_PATH . "/title.php");
}
