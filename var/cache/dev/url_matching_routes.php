<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/_profiler' => [[['_route' => '_profiler_home', '_controller' => 'web_profiler.controller.profiler::homeAction'], null, null, null, true, false, null]],
        '/_profiler/search' => [[['_route' => '_profiler_search', '_controller' => 'web_profiler.controller.profiler::searchAction'], null, null, null, false, false, null]],
        '/_profiler/search_bar' => [[['_route' => '_profiler_search_bar', '_controller' => 'web_profiler.controller.profiler::searchBarAction'], null, null, null, false, false, null]],
        '/_profiler/phpinfo' => [[['_route' => '_profiler_phpinfo', '_controller' => 'web_profiler.controller.profiler::phpinfoAction'], null, null, null, false, false, null]],
        '/_profiler/open' => [[['_route' => '_profiler_open_file', '_controller' => 'web_profiler.controller.profiler::openAction'], null, null, null, false, false, null]],
        '/article' => [[['_route' => 'article_index', '_controller' => 'App\\Controller\\ArticleController::index'], null, ['GET' => 0], null, true, false, null]],
        '/article/create' => [[['_route' => 'article_create', '_controller' => 'App\\Controller\\ArticleController::create'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/general/home' => [[['_route' => 'public_home_page', '_controller' => 'App\\Controller\\GeneralPagesController::publicHomePage'], null, ['GET' => 0], null, false, false, null]],
        '/login' => [[['_route' => 'app_login', '_controller' => 'App\\Controller\\SecurityController::login'], null, null, null, false, false, null]],
        '/logout' => [[['_route' => 'app_logout', '_controller' => 'App\\Controller\\SecurityController::logout'], null, null, null, false, false, null]],
        '/user' => [[['_route' => 'user_index', '_controller' => 'App\\Controller\\UserController::index'], null, ['GET' => 0], null, true, false, null]],
        '/user/register-as-new-member' => [[['_route' => 'register_as_new_member', '_controller' => 'App\\Controller\\UserController::registerAsNewMember'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/writer/display-writer' => [[['_route' => 'writer_displayWritersList', '_controller' => 'App\\Controller\\WriterController::displayWritersListAction'], null, ['GET' => 0], null, false, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/_(?'
                    .'|error/(\\d+)(?:\\.([^/]++))?(*:38)'
                    .'|wdt/([^/]++)(*:57)'
                    .'|profiler/([^/]++)(?'
                        .'|/(?'
                            .'|search/results(*:102)'
                            .'|router(*:116)'
                            .'|exception(?'
                                .'|(*:136)'
                                .'|\\.css(*:149)'
                            .')'
                        .')'
                        .'|(*:159)'
                    .')'
                .')'
                .'|/a(?'
                    .'|rticle(?'
                        .'|\\-comment/ajax\\-(?'
                            .'|add\\-comment\\-to\\-article/([^/]++)(*:236)'
                            .'|remove\\-comment\\-from\\-article/([^/]++)(*:283)'
                        .')'
                        .'|/([^/]++)(?'
                            .'|(*:304)'
                            .'|/edit(*:317)'
                            .'|(*:325)'
                        .')'
                    .')'
                    .'|dmin/article\\-visit/show\\-visits\\-of\\-article/(\\d+)(*:386)'
                .')'
                .'|/bookmark/ajax\\-(?'
                    .'|add\\-bookmark\\-to\\-article/([^/]++)(*:449)'
                    .'|remove\\-bookmark\\-from\\-article/([^/]++)(*:497)'
                .')'
                .'|/follow/ajax\\-(?'
                    .'|add\\-follow\\-to\\-writer/([^/]++)(*:555)'
                    .'|remove\\-follow\\-from\\-writer/([^/]++)(*:600)'
                .')'
                .'|/user(?'
                    .'|/([^/]++)(?'
                        .'|(*:629)'
                        .'|/edit(*:642)'
                        .'|(*:650)'
                    .')'
                    .'|\\-like/ajax\\-(?'
                        .'|add\\-like\\-to\\-article/([^/]++)(*:706)'
                        .'|remove\\-like\\-of\\-artile/([^/]++)(*:747)'
                    .')'
                .')'
                .'|/writer/display\\-partial\\-writer\\-resume\\-bloc/([^/]++)(*:812)'
                .'|/js/routing(?:\\.(js|json))?(*:847)'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        38 => [[['_route' => '_preview_error', '_controller' => 'error_controller::preview', '_format' => 'html'], ['code', '_format'], null, null, false, true, null]],
        57 => [[['_route' => '_wdt', '_controller' => 'web_profiler.controller.profiler::toolbarAction'], ['token'], null, null, false, true, null]],
        102 => [[['_route' => '_profiler_search_results', '_controller' => 'web_profiler.controller.profiler::searchResultsAction'], ['token'], null, null, false, false, null]],
        116 => [[['_route' => '_profiler_router', '_controller' => 'web_profiler.controller.router::panelAction'], ['token'], null, null, false, false, null]],
        136 => [[['_route' => '_profiler_exception', '_controller' => 'web_profiler.controller.exception_panel::body'], ['token'], null, null, false, false, null]],
        149 => [[['_route' => '_profiler_exception_css', '_controller' => 'web_profiler.controller.exception_panel::stylesheet'], ['token'], null, null, false, false, null]],
        159 => [[['_route' => '_profiler', '_controller' => 'web_profiler.controller.profiler::panelAction'], ['token'], null, null, false, true, null]],
        236 => [[['_route' => 'articleComment_ajaxAddCommentToArticle', '_controller' => 'App\\Controller\\ArticleCommentController::ajaxAddCommentToArticle'], ['idArticle'], null, null, false, true, null]],
        283 => [[['_route' => 'articleComment_ajaxRemoveCommentFromArticle', '_controller' => 'App\\Controller\\ArticleCommentController::ajaxRemoveCommentFromArticle'], ['idComment'], null, null, false, true, null]],
        304 => [[['_route' => 'article_show', '_controller' => 'App\\Controller\\ArticleController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        317 => [[['_route' => 'article_edit', '_controller' => 'App\\Controller\\ArticleController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        325 => [[['_route' => 'article_delete', '_controller' => 'App\\Controller\\ArticleController::delete'], ['id'], ['DELETE' => 0], null, false, true, null]],
        386 => [[['_route' => 'articleVisit_showVisitsOfArticle', '_controller' => 'App\\Controller\\ArticleVisitController::removeAllVisitsOfArticle'], ['idArticle'], null, null, false, true, null]],
        449 => [[['_route' => 'bookmark_ajaxAddBookmarkToArticle', '_controller' => 'App\\Controller\\BookmarkController::ajaxAddBookmarkToArticle'], ['idArticle'], null, null, false, true, null]],
        497 => [[['_route' => 'bookmark_ajaxRemoveBookmarkFromArticle', '_controller' => 'App\\Controller\\BookmarkController::ajaxRemoveBookmarkFromArticle'], ['idArticle'], null, null, false, true, null]],
        555 => [[['_route' => 'follow_ajaxAddFollowToWriter', '_controller' => 'App\\Controller\\FollowController::ajaxAddFollowToWriter'], ['idWriter'], null, null, false, true, null]],
        600 => [[['_route' => 'follow_ajaxRemoveFollowFromWriter', '_controller' => 'App\\Controller\\FollowController::ajaxRemoveFollowFromWriter'], ['idWriter'], null, null, false, true, null]],
        629 => [[['_route' => 'user_show', '_controller' => 'App\\Controller\\UserController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        642 => [[['_route' => 'user_edit', '_controller' => 'App\\Controller\\UserController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        650 => [[['_route' => 'user_delete', '_controller' => 'App\\Controller\\UserController::delete'], ['id'], ['DELETE' => 0], null, false, true, null]],
        706 => [[['_route' => 'userLike_ajaxAddLikeToArticle', '_controller' => 'App\\Controller\\UserLikeController::ajaxAddLikeToArticle'], ['idArticle'], null, null, false, true, null]],
        747 => [[['_route' => 'userLike_ajaxRemoveLikeOfArticle', '_controller' => 'App\\Controller\\UserLikeController::ajaxRemoveLikeOfArticle'], ['idArticle'], null, null, false, true, null]],
        812 => [[['_route' => 'writer_displayPartialWriterResumeBlock', '_controller' => 'App\\Controller\\WriterController::displayPartialWriterResumeBlock'], ['idWriter'], ['GET' => 0], null, false, true, null]],
        847 => [
            [['_route' => 'fos_js_routing_js', '_controller' => 'fos_js_routing.controller::indexAction', '_format' => 'js'], ['_format'], ['GET' => 0], null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
