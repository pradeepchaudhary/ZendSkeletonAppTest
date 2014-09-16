<?php
return array(
    'router' => array(
        'routes' => array(
            'hello-hello-world' => array(
                'type'    => 'Literal',
                    'options' => array(
                    'route' => '/hello/world',
                    'defaults' => array(
                        'controller' => 'hello\Controller\Hello',
                        'action'     => 'world',
                    ),
                ),
            ),
        ),
    ),
    'controllers' => array(
        'invokables' => array(
            'hello\Controller\Hello' => 'hello\Controller\HelloController',
        ),
    ),
	'controllers' => array(
        'invokables' => array(
            'hello\Controller\Index' => 'hello\Controller\IndexController',
            // Do similar for each other controller in your module
        ),
    ),
	'hello' => array(
        'type'    => 'Literal',
        'options' => array(
            'route'    => '/hello',
            'defaults' => array(
                'controller'    => 'hello\Controller\Hello',
                'action'        => 'world',
            ),
        ),
        'may_terminate' => true,
        'child_routes' => array(
            'default' => array(
                'type'    => 'Segment',
                'options' => array(
                    'route'    => '/[:controller[/:action]]',
                    'constraints' => array(
                        'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                    ),
                    'defaults' => array(
                    ),
                ),
            ),
        ),
    ),
    'view_manager' => array(
	'display_not_found_reason' => true,
'display_exceptions' => true,
'doctype' => 'HTML5',
'not_found_template' => 'error/404',
'exception_template' => 'error/index',
        'template_path_stack' => array(
            'hello' => __DIR__ . '/../view',
        ),
    ),
);
