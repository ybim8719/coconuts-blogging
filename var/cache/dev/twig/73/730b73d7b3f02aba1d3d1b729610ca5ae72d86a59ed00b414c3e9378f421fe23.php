<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* article/show.html.twig */
class __TwigTemplate_dd47bef0edc291f3c5af1e6a7ac8fd7fed468ba555c93b8a3596c5e4dfa9413b extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'body' => [$this, 'block_body'],
            'javascripts' => [$this, 'block_javascripts'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "article/show.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "article/show.html.twig"));

        $this->parent = $this->loadTemplate("base.html.twig", "article/show.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 3
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        echo "Article";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 5
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 6
        echo "    <div class = \"coconuts-article-container\">
        <div>
            <img class = \"coconuts-main-article-picture\"
                 src=\"";
        // line 9
        echo twig_escape_filter($this->env, $this->extensions['Vich\UploaderBundle\Twig\Extension\UploaderExtension']->asset((isset($context["article"]) || array_key_exists("article", $context) ? $context["article"] : (function () { throw new RuntimeError('Variable "article" does not exist.', 9, $this->source); })())), "html", null, true);
        echo "\"
                 alt=\"";
        // line 10
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["article"]) || array_key_exists("article", $context) ? $context["article"] : (function () { throw new RuntimeError('Variable "article" does not exist.', 10, $this->source); })()), "title", [], "any", false, false, false, 10), "html", null, true);
        echo "\"
            />
        </div>
        <br>
        <h1>
            ";
        // line 15
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["article"]) || array_key_exists("article", $context) ? $context["article"] : (function () { throw new RuntimeError('Variable "article" does not exist.', 15, $this->source); })()), "title", [], "any", false, false, false, 15), "html", null, true);
        echo "
        </h1>
        <h4>
            <span>";
        // line 18
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["article"]) || array_key_exists("article", $context) ? $context["article"] : (function () { throw new RuntimeError('Variable "article" does not exist.', 18, $this->source); })()), "chapeau", [], "any", false, false, false, 18), "html", null, true);
        echo "</span>
            <i class=\"";
        // line 19
        echo (((isset($context["hasBookmark"]) || array_key_exists("hasBookmark", $context) ? $context["hasBookmark"] : (function () { throw new RuntimeError('Variable "hasBookmark" does not exist.', 19, $this->source); })())) ? ("fas") : ("far"));
        echo " fa-bookmark toggle-bookmark-article\"></i>
        </h4>
        <div class=\"row\">
            <div class=\"col-1 \">
                <i class=\"far fa-heart\"></i>
                <span class=\"dynamic-likes-counter-of-article\">";
        // line 24
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["article"]) || array_key_exists("article", $context) ? $context["article"] : (function () { throw new RuntimeError('Variable "article" does not exist.', 24, $this->source); })()), "nbOfLikes", [], "any", false, false, false, 24), "html", null, true);
        echo "</span>
            </div>
            <div class=\"col-1 \">
                <i class=\"fas fa-glasses\"></i>
                <span>";
        // line 28
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["article"]) || array_key_exists("article", $context) ? $context["article"] : (function () { throw new RuntimeError('Variable "article" does not exist.', 28, $this->source); })()), "nbOfVisits", [], "any", false, false, false, 28), "html", null, true);
        echo "</span>
            </div>
            <div class=\"col-1 \">
                <i class=\"far fa-comments\"></i>
                <span>";
        // line 32
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["article"]) || array_key_exists("article", $context) ? $context["article"] : (function () { throw new RuntimeError('Variable "article" does not exist.', 32, $this->source); })()), "nbOfComments", [], "any", false, false, false, 32), "html", null, true);
        echo "</span>
            </div>
        </div>
        <div class=\"row\">
            <div class=\"col-1\">
                <img src=\"";
        // line 37
        echo twig_escape_filter($this->env, $this->extensions['Vich\UploaderBundle\Twig\Extension\UploaderExtension']->asset(twig_get_attribute($this->env, $this->source, (isset($context["article"]) || array_key_exists("article", $context) ? $context["article"] : (function () { throw new RuntimeError('Variable "article" does not exist.', 37, $this->source); })()), "user", [], "any", false, false, false, 37)), "html", null, true);
        echo "\"
                     alt=\"";
        // line 38
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["article"]) || array_key_exists("article", $context) ? $context["article"] : (function () { throw new RuntimeError('Variable "article" does not exist.', 38, $this->source); })()), "user", [], "any", false, false, false, 38), "username", [], "any", false, false, false, 38), "html", null, true);
        echo "\"
                     class=\"coconuts-round-picture rikiki-img\"
                />
            </div>
            <div class=\"col-6\">
                <div>
                    <a href = \"";
        // line 44
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("user_show", ["id" => twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["article"]) || array_key_exists("article", $context) ? $context["article"] : (function () { throw new RuntimeError('Variable "article" does not exist.', 44, $this->source); })()), "user", [], "any", false, false, false, 44), "id", [], "any", false, false, false, 44)]), "html", null, true);
        echo "\">
                        Par ";
        // line 45
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["article"]) || array_key_exists("article", $context) ? $context["article"] : (function () { throw new RuntimeError('Variable "article" does not exist.', 45, $this->source); })()), "user", [], "any", false, false, false, 45), "username", [], "any", false, false, false, 45), "html", null, true);
        echo "
                    </a>
                    <a href=\"javascript:void(0)\"
                       class= \"coconuts-follow-button
                       ";
        // line 49
        echo ((0 === twig_compare((isset($context["isFollowing"]) || array_key_exists("isFollowing", $context) ? $context["isFollowing"] : (function () { throw new RuntimeError('Variable "isFollowing" does not exist.', 49, $this->source); })()), false)) ? ("follow") : ("unfollow"));
        echo "\"
                    >
                        ";
        // line 51
        echo ((0 === twig_compare((isset($context["isFollowing"]) || array_key_exists("isFollowing", $context) ? $context["isFollowing"] : (function () { throw new RuntimeError('Variable "isFollowing" does not exist.', 51, $this->source); })()), false)) ? ("S'abonner") : ("Se désabonner"));
        echo "
                    </a>
                </div>
                <div>
                    ";
        // line 55
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["article"]) || array_key_exists("article", $context) ? $context["article"] : (function () { throw new RuntimeError('Variable "article" does not exist.', 55, $this->source); })()), "createdAt", [], "any", false, false, false, 55), "M-d"), "html", null, true);
        echo "
                </div>
            </div>
        </div>

        <div>";
        // line 60
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["article"]) || array_key_exists("article", $context) ? $context["article"] : (function () { throw new RuntimeError('Variable "article" does not exist.', 60, $this->source); })()), "description", [], "any", false, false, false, 60), "html", null, true);
        echo " </div>
        <br>

        <div>
            Vous avez aimé cet article ? Faites-le savoir à son auteur (qui vous aimera d'autant plus fort!)
            <i class=\"far fa-heart fa-3x toggle-like-article\"></i>
            <span class=\"dynamic-likes-counter-of-article\">";
        // line 66
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["article"]) || array_key_exists("article", $context) ? $context["article"] : (function () { throw new RuntimeError('Variable "article" does not exist.', 66, $this->source); })()), "nbOfLikes", [], "any", false, false, false, 66), "html", null, true);
        echo "</span>
        </div>

        <!-- BLOC AUTEUR -->
        ";
        // line 70
        echo $this->env->getRuntime('Symfony\Bridge\Twig\Extension\HttpKernelRuntime')->renderFragment(Symfony\Bridge\Twig\Extension\HttpKernelExtension::controller("App\\Controller\\WriterController::displayPartialWriterResumeBlock", ["idWriter" => twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source,         // line 72
(isset($context["article"]) || array_key_exists("article", $context) ? $context["article"] : (function () { throw new RuntimeError('Variable "article" does not exist.', 72, $this->source); })()), "user", [], "any", false, false, false, 72), "id", [], "any", false, false, false, 72)]));
        // line 73
        echo "

        <input id=\"visitorId\" name=\"visitorId\" type=\"hidden\" value=\"";
        // line 75
        (((null === twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 75, $this->source); })()), "user", [], "any", false, false, false, 75))) ? (print ("")) : (print (twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 75, $this->source); })()), "user", [], "any", false, false, false, 75), "id", [], "any", false, false, false, 75), "html", null, true))));
        echo "\">
        <input id=\"hasLiked\" name=\"hasLiked\" type=\"hidden\" value=\"";
        // line 76
        echo ((0 === twig_compare((isset($context["userHasLiked"]) || array_key_exists("userHasLiked", $context) ? $context["userHasLiked"] : (function () { throw new RuntimeError('Variable "userHasLiked" does not exist.', 76, $this->source); })()), false)) ? (0) : (1));
        echo "\">
        <input id=\"articleId\" name=\"articleId\" type=\"hidden\" value=\"";
        // line 77
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["article"]) || array_key_exists("article", $context) ? $context["article"] : (function () { throw new RuntimeError('Variable "article" does not exist.', 77, $this->source); })()), "id", [], "any", false, false, false, 77), "html", null, true);
        echo "\">
        <input id=\"hasBookmark\" name=\"hasBookmark\" type=\"hidden\" value=\"";
        // line 78
        echo ((0 === twig_compare((isset($context["hasBookmark"]) || array_key_exists("hasBookmark", $context) ? $context["hasBookmark"] : (function () { throw new RuntimeError('Variable "hasBookmark" does not exist.', 78, $this->source); })()), false)) ? (0) : (1));
        echo "\">
        <input id=\"writerId\" name=\"writerId\" type=\"hidden\" value=\"";
        // line 79
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["article"]) || array_key_exists("article", $context) ? $context["article"] : (function () { throw new RuntimeError('Variable "article" does not exist.', 79, $this->source); })()), "user", [], "any", false, false, false, 79), "id", [], "any", false, false, false, 79), "html", null, true);
        echo "\">
        <input id=\"isFollowing\" name=\"isFollowing\" type=\"hidden\" value=\"";
        // line 80
        echo ((0 === twig_compare((isset($context["isFollowing"]) || array_key_exists("isFollowing", $context) ? $context["isFollowing"] : (function () { throw new RuntimeError('Variable "isFollowing" does not exist.', 80, $this->source); })()), false)) ? (0) : (1));
        echo "\">




        <div id=\"comment-list\">
            ";
        // line 86
        if ( !twig_test_empty((isset($context["comments"]) || array_key_exists("comments", $context) ? $context["comments"] : (function () { throw new RuntimeError('Variable "comments" does not exist.', 86, $this->source); })()))) {
            // line 87
            echo "                <div>Commentaires : </div>
                <ul class=\"coconuts-comment-section\">
                    <li id = \"jquery-hidden-comment-block\" class=\"comment\" data-id = \"\">
                        <div class=\"comment-info\">
                            <a class=\"comment-username\" href=\"\">
                            </a>
                            <span class=\"comment-date\">A l'instant</span>
                        </div>
                        <a class=\"comment-avatar\" href=\"#\">
                            <img class=\"coconuts-round-picture rikiki-img user-picture\"
                                 src=\"\"
                                 width=\"35\" alt=\"Profile Avatar\" title=\"\"
                            />
                        </a>
                        <p class=\"comment-body\"></p>
                        <i class=\"fas fa-trash-alt\"></i>
                    </li>
                    ";
            // line 104
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["comments"]) || array_key_exists("comments", $context) ? $context["comments"] : (function () { throw new RuntimeError('Variable "comments" does not exist.', 104, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["comment"]) {
                // line 105
                echo "                        <li class=\"comment ";
                echo ((0 === twig_compare(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["comment"], "author", [], "any", false, false, false, 105), "id", [], "any", false, false, false, 105), twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["article"]) || array_key_exists("article", $context) ? $context["article"] : (function () { throw new RuntimeError('Variable "article" does not exist.', 105, $this->source); })()), "user", [], "any", false, false, false, 105), "id", [], "any", false, false, false, 105))) ? ("author-comment") : ("user-comment"));
                echo "\" data-id = \"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["comment"], "id", [], "any", false, false, false, 105), "html", null, true);
                echo "\">
                            <div class=\"comment-info\">
                                <a class=\"comment-username\" href=\"";
                // line 107
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("user_show", ["id" => twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["comment"], "author", [], "any", false, false, false, 107), "id", [], "any", false, false, false, 107)]), "html", null, true);
                echo "\">
                                    ";
                // line 108
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["comment"], "author", [], "any", false, false, false, 108), "username", [], "any", false, false, false, 108), "html", null, true);
                echo "
                                </a>
                                <span class=\"comment-date\">";
                // line 110
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["comment"], "createdAt", [], "any", false, false, false, 110), "d-m-Y"), "html", null, true);
                echo "</span>
                            </div>
                            <a class=\"comment-avatar\" href=\"#\">
                                <img class=\"coconuts-round-picture rikiki-img\"
                                     src=\"";
                // line 114
                echo twig_escape_filter($this->env, $this->extensions['Vich\UploaderBundle\Twig\Extension\UploaderExtension']->asset(twig_get_attribute($this->env, $this->source, $context["comment"], "author", [], "any", false, false, false, 114)), "html", null, true);
                echo "\"
                                     width=\"35\" alt=\"Profile Avatar\" title=\"";
                // line 115
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["comment"], "author", [], "any", false, false, false, 115), "username", [], "any", false, false, false, 115), "html", null, true);
                echo "\"
                                />
                            </a>
                            <p class=\"comment-body\">";
                // line 118
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["comment"], "content", [], "any", false, false, false, 118), "html", null, true);
                echo "</p>
                            ";
                // line 119
                if ( !(null === twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 119, $this->source); })()), "user", [], "any", false, false, false, 119))) {
                    // line 120
                    echo "                                ";
                    if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 120, $this->source); })()), "user", [], "any", false, false, false, 120), "isAdmin", [], "any", false, false, false, 120) || 0 === twig_compare(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 120, $this->source); })()), "user", [], "any", false, false, false, 120), "id", [], "any", false, false, false, 120), twig_get_attribute($this->env, $this->source, $context["comment"], "id", [], "any", false, false, false, 120)))) {
                        // line 121
                        echo "                                    <i class=\"fas fa-trash-alt delete-comment-action\" data-id=\" ";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["comment"], "id", [], "any", false, false, false, 121), "html", null, true);
                        echo "\"></i>
                                ";
                    }
                    // line 123
                    echo "                            ";
                }
                // line 124
                echo "                        </li>
                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['comment'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 126
            echo "
                    ";
            // line 127
            if ( !(null === twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 127, $this->source); })()), "user", [], "any", false, false, false, 127))) {
                // line 128
                echo "                        <li class=\"write-new\">
                            <label for = \"send-comment-input\"></label>
                            <input name =\"send-comment-input\" id=\"send-comment-input\" type=\"text\">
                            <div>
                                <button id=\"send-comment-action\">Envoyer</button>
                            </div>
                            <img class=\"coconuts-round-picture rikiki-img\" id=\"visitor-picture\"
                                 src=\"";
                // line 135
                echo twig_escape_filter($this->env, $this->extensions['Vich\UploaderBundle\Twig\Extension\UploaderExtension']->asset(twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 135, $this->source); })()), "user", [], "any", false, false, false, 135)), "html", null, true);
                echo "\" data-href=\"";
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("user_show", ["id" => twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 135, $this->source); })()), "user", [], "any", false, false, false, 135), "id", [], "any", false, false, false, 135)]), "html", null, true);
                echo "\"
                                 width=\"35\" alt=\"Profile Avatar\" title=\"";
                // line 136
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 136, $this->source); })()), "user", [], "any", false, false, false, 136), "username", [], "any", false, false, false, 136), "html", null, true);
                echo "\"
                            />
                        </li>
                    ";
            }
            // line 140
            echo "                </ul>
                ";
        } else {
            // line 142
            echo "                    <div>Pas de commentaires à ce jour : </div>
            ";
        }
        // line 144
        echo "        </div>

        ";
        // line 146
        if ( !(null === twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 146, $this->source); })()), "user", [], "any", false, false, false, 146))) {
            // line 147
            echo "            ";
            if (0 === twig_compare(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 147, $this->source); })()), "user", [], "any", false, false, false, 147), "id", [], "any", false, false, false, 147), twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["article"]) || array_key_exists("article", $context) ? $context["article"] : (function () { throw new RuntimeError('Variable "article" does not exist.', 147, $this->source); })()), "user", [], "any", false, false, false, 147), "id", [], "any", false, false, false, 147))) {
                // line 148
                echo "                <a href=\"";
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("article_edit", ["id" => twig_get_attribute($this->env, $this->source, (isset($context["article"]) || array_key_exists("article", $context) ? $context["article"] : (function () { throw new RuntimeError('Variable "article" does not exist.', 148, $this->source); })()), "id", [], "any", false, false, false, 148)]), "html", null, true);
                echo "\">Modifier votre article</a>
            ";
            }
            // line 150
            echo "        ";
        }
        // line 151
        echo "    </div>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 154
    public function block_javascripts($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "javascripts"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "javascripts"));

        // line 155
        echo "    ";
        $this->displayParentBlock("javascripts", $context, $blocks);
        echo "
    ";
        // line 156
        echo $this->extensions['Symfony\WebpackEncoreBundle\Twig\EntryFilesTwigExtension']->renderWebpackScriptTags("toggleArticleLike");
        echo "
    ";
        // line 157
        echo $this->extensions['Symfony\WebpackEncoreBundle\Twig\EntryFilesTwigExtension']->renderWebpackScriptTags("toggleArticleBookmark");
        echo "
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    public function getTemplateName()
    {
        return "article/show.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  409 => 157,  405 => 156,  400 => 155,  390 => 154,  379 => 151,  376 => 150,  370 => 148,  367 => 147,  365 => 146,  361 => 144,  357 => 142,  353 => 140,  346 => 136,  340 => 135,  331 => 128,  329 => 127,  326 => 126,  319 => 124,  316 => 123,  310 => 121,  307 => 120,  305 => 119,  301 => 118,  295 => 115,  291 => 114,  284 => 110,  279 => 108,  275 => 107,  267 => 105,  263 => 104,  244 => 87,  242 => 86,  233 => 80,  229 => 79,  225 => 78,  221 => 77,  217 => 76,  213 => 75,  209 => 73,  207 => 72,  206 => 70,  199 => 66,  190 => 60,  182 => 55,  175 => 51,  170 => 49,  163 => 45,  159 => 44,  150 => 38,  146 => 37,  138 => 32,  131 => 28,  124 => 24,  116 => 19,  112 => 18,  106 => 15,  98 => 10,  94 => 9,  89 => 6,  79 => 5,  60 => 3,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Article{% endblock %}

{% block body %}
    <div class = \"coconuts-article-container\">
        <div>
            <img class = \"coconuts-main-article-picture\"
                 src=\"{{ vich_uploader_asset(article) }}\"
                 alt=\"{{ article.title }}\"
            />
        </div>
        <br>
        <h1>
            {{ article.title }}
        </h1>
        <h4>
            <span>{{ article.chapeau }}</span>
            <i class=\"{{ hasBookmark ? \"fas\" : \"far\" }} fa-bookmark toggle-bookmark-article\"></i>
        </h4>
        <div class=\"row\">
            <div class=\"col-1 \">
                <i class=\"far fa-heart\"></i>
                <span class=\"dynamic-likes-counter-of-article\">{{article.nbOfLikes}}</span>
            </div>
            <div class=\"col-1 \">
                <i class=\"fas fa-glasses\"></i>
                <span>{{article.nbOfVisits}}</span>
            </div>
            <div class=\"col-1 \">
                <i class=\"far fa-comments\"></i>
                <span>{{article.nbOfComments}}</span>
            </div>
        </div>
        <div class=\"row\">
            <div class=\"col-1\">
                <img src=\"{{ vich_uploader_asset(article.user) }}\"
                     alt=\"{{ article.user.username }}\"
                     class=\"coconuts-round-picture rikiki-img\"
                />
            </div>
            <div class=\"col-6\">
                <div>
                    <a href = \"{{ path('user_show', {'id': article.user.id}) }}\">
                        Par {{ article.user.username }}
                    </a>
                    <a href=\"javascript:void(0)\"
                       class= \"coconuts-follow-button
                       {{ isFollowing == false ? 'follow' : 'unfollow' }}\"
                    >
                        {{ isFollowing == false ? \"S\\'abonner\" : 'Se désabonner'  }}
                    </a>
                </div>
                <div>
                    {{ article.createdAt|date('M-d') }}
                </div>
            </div>
        </div>

        <div>{{ article.description }} </div>
        <br>

        <div>
            Vous avez aimé cet article ? Faites-le savoir à son auteur (qui vous aimera d'autant plus fort!)
            <i class=\"far fa-heart fa-3x toggle-like-article\"></i>
            <span class=\"dynamic-likes-counter-of-article\">{{article.nbOfLikes}}</span>
        </div>

        <!-- BLOC AUTEUR -->
        {{ render(controller(
            'App\\\\Controller\\\\WriterController::displayPartialWriterResumeBlock',
            { 'idWriter': article.user.id }
        )) }}

        <input id=\"visitorId\" name=\"visitorId\" type=\"hidden\" value=\"{{ app.user is null ? \"\" : app.user.id }}\">
        <input id=\"hasLiked\" name=\"hasLiked\" type=\"hidden\" value=\"{{ userHasLiked == false ? 0 : 1 }}\">
        <input id=\"articleId\" name=\"articleId\" type=\"hidden\" value=\"{{ article.id }}\">
        <input id=\"hasBookmark\" name=\"hasBookmark\" type=\"hidden\" value=\"{{ hasBookmark == false ? 0 : 1 }}\">
        <input id=\"writerId\" name=\"writerId\" type=\"hidden\" value=\"{{ article.user.id}}\">
        <input id=\"isFollowing\" name=\"isFollowing\" type=\"hidden\" value=\"{{ isFollowing == false ? 0 : 1}}\">




        <div id=\"comment-list\">
            {% if comments is not empty %}
                <div>Commentaires : </div>
                <ul class=\"coconuts-comment-section\">
                    <li id = \"jquery-hidden-comment-block\" class=\"comment\" data-id = \"\">
                        <div class=\"comment-info\">
                            <a class=\"comment-username\" href=\"\">
                            </a>
                            <span class=\"comment-date\">A l'instant</span>
                        </div>
                        <a class=\"comment-avatar\" href=\"#\">
                            <img class=\"coconuts-round-picture rikiki-img user-picture\"
                                 src=\"\"
                                 width=\"35\" alt=\"Profile Avatar\" title=\"\"
                            />
                        </a>
                        <p class=\"comment-body\"></p>
                        <i class=\"fas fa-trash-alt\"></i>
                    </li>
                    {% for comment in comments %}
                        <li class=\"comment {{ comment.author.id == article.user.id ? \"author-comment\" : \"user-comment\"}}\" data-id = \"{{ comment.id }}\">
                            <div class=\"comment-info\">
                                <a class=\"comment-username\" href=\"{{ path('user_show', {id : comment.author.id}) }}\">
                                    {{ comment.author.username }}
                                </a>
                                <span class=\"comment-date\">{{ comment.createdAt|date(\"d-m-Y\") }}</span>
                            </div>
                            <a class=\"comment-avatar\" href=\"#\">
                                <img class=\"coconuts-round-picture rikiki-img\"
                                     src=\"{{ vich_uploader_asset(comment.author) }}\"
                                     width=\"35\" alt=\"Profile Avatar\" title=\"{{ comment.author.username }}\"
                                />
                            </a>
                            <p class=\"comment-body\">{{ comment.content }}</p>
                            {% if app.user is not null %}
                                {% if app.user.isAdmin or app.user.id == comment.id %}
                                    <i class=\"fas fa-trash-alt delete-comment-action\" data-id=\" {{ comment.id }}\"></i>
                                {% endif %}
                            {% endif %}
                        </li>
                    {% endfor %}

                    {% if app.user is not null  %}
                        <li class=\"write-new\">
                            <label for = \"send-comment-input\"></label>
                            <input name =\"send-comment-input\" id=\"send-comment-input\" type=\"text\">
                            <div>
                                <button id=\"send-comment-action\">Envoyer</button>
                            </div>
                            <img class=\"coconuts-round-picture rikiki-img\" id=\"visitor-picture\"
                                 src=\"{{ vich_uploader_asset(app.user) }}\" data-href=\"{{ path('user_show', {id : app.user.id} ) }}\"
                                 width=\"35\" alt=\"Profile Avatar\" title=\"{{ app.user.username }}\"
                            />
                        </li>
                    {% endif %}
                </ul>
                {% else %}
                    <div>Pas de commentaires à ce jour : </div>
            {% endif %}
        </div>

        {% if app.user is not null %}
            {% if app.user.id == article.user.id %}
                <a href=\"{{ path('article_edit', {'id': article.id}) }}\">Modifier votre article</a>
            {% endif %}
        {% endif %}
    </div>
{% endblock %}

{% block javascripts %}
    {{ parent() }}
    {{ encore_entry_script_tags('toggleArticleLike') }}
    {{ encore_entry_script_tags('toggleArticleBookmark') }}
{% endblock %}

", "article/show.html.twig", "/home/pascal/Rendu/ProjetCocoNuts/ProjetPognon/templates/article/show.html.twig");
    }
}
