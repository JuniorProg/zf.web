<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
    protected function _initView(){//������ � layout

        $this->bootstrap('layout'); // ��������� layout � bootstrap.php
        $layout = $this->getResource('layout'); // ������� layout
        $view = $layout->getView();

        $view->doctype('XHTML1_TRANSITIONAL');
        $view->headTitle('Zend Framework')
                    ->setSeparator(' - ');

        $view->headMeta()->appendHttpEquiv('Content-type','text/html;charset-utf8') // ���� ����
                            ->appendName('author','bloodrain777');


        /**
         * ����������� ������
         * appendStylesheet - 1 ��������: ���� � ����� �� �������� public
         * appendStylesheet - 2� : ���������� ��� ������� ������������ css
         */

        $view->headLink()->appendStylesheet('/css/blueprint/screen.css','screen,projection')
                         ->appendStylesheet('/css/blueprint/print.css','print')
                         ->appendStylesheet('/css/blueprint/ie.css','screen,projection','ie');

        /**********************/


        $view->headScript()->appendFile('/js/jquery-1.11.3.min.js'); // ���������� jQuery

        $view->headLink(array(
                'href' => 'favicon.png',
                'rel'   => 'icon'


        ));
    }

}

