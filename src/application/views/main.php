<?php

tag::$view->of('~Home');
tag::$view->addCSS(HTML::BOOTSTRAP);

tag::h1('You are @main page...');
tag::p('It works :)')->set('style', 'color:green; font-size:500%');
