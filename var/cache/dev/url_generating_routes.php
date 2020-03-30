<?php

// This file has been auto-generated by the Symfony Routing Component.

return [
    '_preview_error' => [['code', '_format'], ['_controller' => 'error_controller::preview', '_format' => 'html'], ['code' => '\\d+'], [['variable', '.', '[^/]++', '_format', true], ['variable', '/', '\\d+', 'code', true], ['text', '/_error']], [], []],
    '_wdt' => [['token'], ['_controller' => 'web_profiler.controller.profiler::toolbarAction'], [], [['variable', '/', '[^/]++', 'token', true], ['text', '/_wdt']], [], []],
    '_profiler_home' => [[], ['_controller' => 'web_profiler.controller.profiler::homeAction'], [], [['text', '/_profiler/']], [], []],
    '_profiler_search' => [[], ['_controller' => 'web_profiler.controller.profiler::searchAction'], [], [['text', '/_profiler/search']], [], []],
    '_profiler_search_bar' => [[], ['_controller' => 'web_profiler.controller.profiler::searchBarAction'], [], [['text', '/_profiler/search_bar']], [], []],
    '_profiler_phpinfo' => [[], ['_controller' => 'web_profiler.controller.profiler::phpinfoAction'], [], [['text', '/_profiler/phpinfo']], [], []],
    '_profiler_search_results' => [['token'], ['_controller' => 'web_profiler.controller.profiler::searchResultsAction'], [], [['text', '/search/results'], ['variable', '/', '[^/]++', 'token', true], ['text', '/_profiler']], [], []],
    '_profiler_open_file' => [[], ['_controller' => 'web_profiler.controller.profiler::openAction'], [], [['text', '/_profiler/open']], [], []],
    '_profiler' => [['token'], ['_controller' => 'web_profiler.controller.profiler::panelAction'], [], [['variable', '/', '[^/]++', 'token', true], ['text', '/_profiler']], [], []],
    '_profiler_router' => [['token'], ['_controller' => 'web_profiler.controller.router::panelAction'], [], [['text', '/router'], ['variable', '/', '[^/]++', 'token', true], ['text', '/_profiler']], [], []],
    '_profiler_exception' => [['token'], ['_controller' => 'web_profiler.controller.exception_panel::body'], [], [['text', '/exception'], ['variable', '/', '[^/]++', 'token', true], ['text', '/_profiler']], [], []],
    '_profiler_exception_css' => [['token'], ['_controller' => 'web_profiler.controller.exception_panel::stylesheet'], [], [['text', '/exception.css'], ['variable', '/', '[^/]++', 'token', true], ['text', '/_profiler']], [], []],
    'articleComment_ajaxAddCommentToArticle' => [['idArticle'], ['_controller' => 'App\\Controller\\ArticleCommentController::ajaxAddCommentToArticle'], [], [['variable', '/', '[^/]++', 'idArticle', true], ['text', '/article-comment/ajax-add-comment-to-article']], [], []],
    'articleComment_ajaxRemoveCommentFromArticle' => [['idComment'], ['_controller' => 'App\\Controller\\ArticleCommentController::ajaxRemoveCommentFromArticle'], [], [['variable', '/', '[^/]++', 'idComment', true], ['text', '/article-comment/ajax-remove-comment-from-article']], [], []],
    'article_index' => [[], ['_controller' => 'App\\Controller\\ArticleController::index'], [], [['text', '/article/']], [], []],
    'article_create' => [[], ['_controller' => 'App\\Controller\\ArticleController::create'], [], [['text', '/article/create']], [], []],
    'article_show' => [['id'], ['_controller' => 'App\\Controller\\ArticleController::show'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/article']], [], []],
    'article_edit' => [['id'], ['_controller' => 'App\\Controller\\ArticleController::edit'], [], [['text', '/edit'], ['variable', '/', '[^/]++', 'id', true], ['text', '/article']], [], []],
    'article_delete' => [['id'], ['_controller' => 'App\\Controller\\ArticleController::delete'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/article']], [], []],
    'articleVisit_showVisitsOfArticle' => [['idArticle'], ['_controller' => 'App\\Controller\\ArticleVisitController::removeAllVisitsOfArticle'], ['idArticle' => '\\d+'], [['variable', '/', '\\d+', 'idArticle', true], ['text', '/admin/article-visit/show-visits-of-article']], [], []],
    'bookmark_ajaxAddBookmarkToArticle' => [['idArticle'], ['_controller' => 'App\\Controller\\BookmarkController::ajaxAddBookmarkToArticle'], [], [['variable', '/', '[^/]++', 'idArticle', true], ['text', '/bookmark/ajax-add-bookmark-to-article']], [], []],
    'bookmark_ajaxRemoveBookmarkFromArticle' => [['idArticle'], ['_controller' => 'App\\Controller\\BookmarkController::ajaxRemoveBookmarkFromArticle'], [], [['variable', '/', '[^/]++', 'idArticle', true], ['text', '/bookmark/ajax-remove-bookmark-from-article']], [], []],
    'follow_ajaxAddFollowToWriter' => [['idWriter'], ['_controller' => 'App\\Controller\\FollowController::ajaxAddFollowToWriter'], [], [['variable', '/', '[^/]++', 'idWriter', true], ['text', '/follow/ajax-add-follow-to-writer']], [], []],
    'follow_ajaxRemoveFollowFromWriter' => [['idWriter'], ['_controller' => 'App\\Controller\\FollowController::ajaxRemoveFollowFromWriter'], [], [['variable', '/', '[^/]++', 'idWriter', true], ['text', '/follow/ajax-remove-follow-from-writer']], [], []],
    'public_home_page' => [[], ['_controller' => 'App\\Controller\\GeneralPagesController::publicHomePage'], [], [['text', '/general/home']], [], []],
    'app_login' => [[], ['_controller' => 'App\\Controller\\SecurityController::login'], [], [['text', '/login']], [], []],
    'app_logout' => [[], ['_controller' => 'App\\Controller\\SecurityController::logout'], [], [['text', '/logout']], [], []],
    'user_index' => [[], ['_controller' => 'App\\Controller\\UserController::index'], [], [['text', '/user/']], [], []],
    'register_as_new_member' => [[], ['_controller' => 'App\\Controller\\UserController::registerAsNewMember'], [], [['text', '/user/register-as-new-member']], [], []],
    'user_show' => [['id'], ['_controller' => 'App\\Controller\\UserController::show'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/user']], [], []],
    'user_edit' => [['id'], ['_controller' => 'App\\Controller\\UserController::edit'], [], [['text', '/edit'], ['variable', '/', '[^/]++', 'id', true], ['text', '/user']], [], []],
    'user_delete' => [['id'], ['_controller' => 'App\\Controller\\UserController::delete'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/user']], [], []],
    'userLike_ajaxAddLikeToArticle' => [['idArticle'], ['_controller' => 'App\\Controller\\UserLikeController::ajaxAddLikeToArticle'], [], [['variable', '/', '[^/]++', 'idArticle', true], ['text', '/user-like/ajax-add-like-to-article']], [], []],
    'userLike_ajaxRemoveLikeOfArticle' => [['idArticle'], ['_controller' => 'App\\Controller\\UserLikeController::ajaxRemoveLikeOfArticle'], [], [['variable', '/', '[^/]++', 'idArticle', true], ['text', '/user-like/ajax-remove-like-of-artile']], [], []],
    'writer_displayWritersList' => [[], ['_controller' => 'App\\Controller\\WriterController::displayWritersListAction'], [], [['text', '/writer/display-writer']], [], []],
    'writer_displayPartialWriterResumeBlock' => [['idWriter'], ['_controller' => 'App\\Controller\\WriterController::displayPartialWriterResumeBlock'], [], [['variable', '/', '[^/]++', 'idWriter', true], ['text', '/writer/display-partial-writer-resume-bloc']], [], []],
    'fos_js_routing_js' => [['_format'], ['_controller' => 'fos_js_routing.controller::indexAction', '_format' => 'js'], ['_format' => 'js|json'], [['variable', '.', 'js|json', '_format', true], ['text', '/js/routing']], [], []],
];
