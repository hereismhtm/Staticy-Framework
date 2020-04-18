<?php

/**
 * -------------------------------
 * Staticy - a simple effective PHP 7.0+ framework for LANs systems.
 *
 * This framework is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or any
 * later version.
 *
 * This framework is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this framework.  If not, see <http://www.gnu.org/licenses/>.
 * -------------------------------
 *
 * This framework act similarly to the MVC concepts in two dimensions.
 * Backend: controller and model became one thing called "unit".
 * Frontend: same as MVC still called "view".
 * It is under development stage and not released publicly yet, it will
 * be published as open source in Github.com.
 *
 * @author      Mustafa Alhadi [<hereismhtm@ymail.com>, <about.me/mhtm>]
 * @copyright   2018 Mustafa Alhadi
 * @license     GNU General Public License, version 3.0 (GPLv3)
 */


/**
 * Main Staticy Framework class
 */
class Staticy
{
    /** @ignore */
    final function __construct()
    {
        //debug: echo '<br/>Staticy :: __construct()<br/>';

        load::$app = $this;

        load::$unit = new $GLOBALS['_sfw_route']['unit'];
        if (load::$unit->_sfw_force_ssl === true) {
            if (strpos(strtolower(APP_URL), 'https') === 0
                && isset($_SERVER['HTTP_X_FORWARDED_PROTO'])
                && $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'http'
                ) {

                header('Location: '. rtrim(APP_URL, rtrim($_SERVER['REQUEST_URI'], '/')). $_SERVER['REQUEST_URI']);
                die();
            }
        }

        data::$unit 	= $GLOBALS['_sfw_route']['unit'];
        data::$action 	= $GLOBALS['_sfw_route']['action'];
        data::$args 	= explode('/', ci($GLOBALS['_sfw_route']['args']));
        if (data::$args[0] == '') {
            data::$args = array();
        }

        load::$app->onStart();
        load::$unit->onDo(data::$action, data::$args);
        load::$app->onStop();
    }

    /** @ignore */
    public function onStart()
    {
        //debug: echo 'onStart at Staticy<br/>';
    }

    /** @ignore */
    public function onStop()
    {
        //debug: echo 'onStop at Staticy<br/>';
    }

    /** @ignore */
    final function __destruct()
    {
        //debug: echo '<br/>Staticy :: __destruct()<br/>';
    }
}
