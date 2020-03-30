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

/* user/show.html.twig */
class __TwigTemplate_6c28a5d202bfb1094122e96a31430b69dfb19605021f66bf73b8fae63bfca6dd extends Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "user/show.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "user/show.html.twig"));

        $this->parent = $this->loadTemplate("base.html.twig", "user/show.html.twig", 1);
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

        echo " ";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 3, $this->source); })()), "username", [], "any", false, false, false, 3), "html", null, true);
        echo " ";
        
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
        echo "    <div class =\"coconuts-container coconuts-page-body\">
        <h1>Profil de ";
        // line 7
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 7, $this->source); })()), "username", [], "any", false, false, false, 7), "html", null, true);
        echo "</a> </h1>
        <table class=\"table table-info\">
            <tbody>
                <tr>
                    <th>Inscrit depuis le :</th>
                    <td>";
        // line 12
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 12, $this->source); })()), "createdAt", [], "any", false, false, false, 12), "m/d/Y"), "html", null, true);
        echo "</td>
                </tr>
                <tr>
                    <th>Username</th>
                    <td>
                        ";
        // line 17
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 17, $this->source); })()), "username", [], "any", false, false, false, 17), "html", null, true);
        echo "      
                        <img src=\"";
        // line 18
        echo twig_escape_filter($this->env, $this->extensions['Vich\UploaderBundle\Twig\Extension\UploaderExtension']->asset((isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 18, $this->source); })())), "html", null, true);
        echo "\" alt=\"";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 18, $this->source); })()), "username", [], "any", false, false, false, 18), "html", null, true);
        echo "\" 
                             class=\"coconuts-writer-mini-picture\" />
                    </td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>";
        // line 24
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 24, $this->source); })()), "email", [], "any", false, false, false, 24), "html", null, true);
        echo "</td>
                </tr>
                <tr>
                    <th>Est administrateur</th>
                    <td>";
        // line 28
        echo ((twig_get_attribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 28, $this->source); })()), "isAdmin", [], "any", false, false, false, 28)) ? ("Yes") : ("No"));
        echo "</td>
                </tr>
                <tr>
                    <th>Description</th>
                    <td>";
        // line 32
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 32, $this->source); })()), "profileDescription", [], "any", false, false, false, 32), "html", null, true);
        echo "</td>
                </tr>
                <tr>
                    <th>Abonnements</th>
                    <td>";
        // line 36
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 36, $this->source); })()), "nbOfSubscribedFollows", [], "any", false, false, false, 36), "html", null, true);
        echo " </td>
                </tr>
                <tr>
                    <th>Abonnés</th>
                    <td>";
        // line 40
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 40, $this->source); })()), "nbOfIncomingFollows", [], "any", false, false, false, 40), "html", null, true);
        echo "</td>
                </tr>
                <tr>
                    <th>Articles écrits</th>
                    <td>";
        // line 44
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 44, $this->source); })()), "nbOfArticles", [], "any", false, false, false, 44), "html", null, true);
        echo "</td>
                </tr>
                <tr>
                    <th>Actions</th>
                    <td>
                        <button class=\"coconuts_follow_writer button-block\" ";
        // line 49
        if ((null === twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 49, $this->source); })()), "user", [], "any", false, false, false, 49))) {
            echo " disabled
                        ";
        } else {
            // line 50
            echo " data-id =";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 50, $this->source); })()), "user", [], "any", false, false, false, 50), "id", [], "any", false, false, false, 50), "html", null, true);
            echo " ";
        }
        echo ">
                            Follow
                        </button>
                    </td>
                </tr>

            </tbody>
        </table>

        ";
        // line 59
        if ( !(null === twig_get_attribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 59, $this->source); })()), "articles", [], "any", false, false, false, 59))) {
            // line 60
            echo "            <div class= \"m-10 pb-20\">Liste des articles écrits par cette personne </div>
            <div class= \"row\">
                ";
            // line 62
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 62, $this->source); })()), "articles", [], "any", false, false, false, 62));
            foreach ($context['_seq'] as $context["_key"] => $context["article"]) {
                // line 63
                echo "                    <div class=\"card col-4\" style=\"width: 18rem;\">
                        <img class=\"card-img-top\" src =\"";
                // line 64
                echo twig_escape_filter($this->env, $this->extensions['Vich\UploaderBundle\Twig\Extension\UploaderExtension']->asset($context["article"]), "html", null, true);
                echo "\" alt=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["article"], "title", [], "any", false, false, false, 64), "html", null, true);
                echo "\" height=\"100\">
                        <div class=\"card-body\">
                            <h5 class=\"card-title\">";
                // line 66
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["article"], "title", [], "any", false, false, false, 66), "html", null, true);
                echo "</h5>
                            <p class=\"card-text\">";
                // line 67
                echo twig_escape_filter($this->env, twig_slice($this->env, strip_tags(twig_get_attribute($this->env, $this->source, $context["article"], "description", [], "any", false, false, false, 67)), 0, 200), "html", null, true);
                echo "</p>
                            <a href=\"";
                // line 68
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("article_show", ["id" => twig_get_attribute($this->env, $this->source, $context["article"], "id", [], "any", false, false, false, 68)]), "html", null, true);
                echo "\" class=\"btn btn-primary\">LIRE</a>
                        </div>
                    </div>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['article'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 72
            echo "            </div>
        ";
        }
        // line 74
        echo "
        <div class= \"row\">
            <a href=\"";
        // line 76
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("user_index");
        echo "\">
                <input type=\"button\" value=\"Retour à la liste\" />
            </a>
               <a href=\"";
        // line 79
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("user_edit", ["id" => twig_get_attribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 79, $this->source); })()), "id", [], "any", false, false, false, 79)]), "html", null, true);
        echo "\">
                <input type=\"button\" value=\"Modifier\" />
            </a>
        </div>
    </div>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    public function getTemplateName()
    {
        return "user/show.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  239 => 79,  233 => 76,  229 => 74,  225 => 72,  215 => 68,  211 => 67,  207 => 66,  200 => 64,  197 => 63,  193 => 62,  189 => 60,  187 => 59,  172 => 50,  167 => 49,  159 => 44,  152 => 40,  145 => 36,  138 => 32,  131 => 28,  124 => 24,  113 => 18,  109 => 17,  101 => 12,  93 => 7,  90 => 6,  80 => 5,  59 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %} {{ user.username }} {% endblock %}

{% block body %}
    <div class =\"coconuts-container coconuts-page-body\">
        <h1>Profil de {{ user.username }}</a> </h1>
        <table class=\"table table-info\">
            <tbody>
                <tr>
                    <th>Inscrit depuis le :</th>
                    <td>{{user.createdAt|date(\"m/d/Y\")}}</td>
                </tr>
                <tr>
                    <th>Username</th>
                    <td>
                        {{ user.username }}      
                        <img src=\"{{ vich_uploader_asset(user) }}\" alt=\"{{ user.username }}\" 
                             class=\"coconuts-writer-mini-picture\" />
                    </td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>{{ user.email }}</td>
                </tr>
                <tr>
                    <th>Est administrateur</th>
                    <td>{{ user.isAdmin ? 'Yes' : 'No' }}</td>
                </tr>
                <tr>
                    <th>Description</th>
                    <td>{{ user.profileDescription }}</td>
                </tr>
                <tr>
                    <th>Abonnements</th>
                    <td>{{user.nbOfSubscribedFollows}} </td>
                </tr>
                <tr>
                    <th>Abonnés</th>
                    <td>{{user.nbOfIncomingFollows}}</td>
                </tr>
                <tr>
                    <th>Articles écrits</th>
                    <td>{{user.nbOfArticles}}</td>
                </tr>
                <tr>
                    <th>Actions</th>
                    <td>
                        <button class=\"coconuts_follow_writer button-block\" {% if app.user is null %} disabled
                        {% else %} data-id ={{app.user.id}} {% endif %}>
                            Follow
                        </button>
                    </td>
                </tr>

            </tbody>
        </table>

        {% if user.articles is not null %}
            <div class= \"m-10 pb-20\">Liste des articles écrits par cette personne </div>
            <div class= \"row\">
                {% for article in user.articles %}
                    <div class=\"card col-4\" style=\"width: 18rem;\">
                        <img class=\"card-img-top\" src =\"{{ vich_uploader_asset(article) }}\" alt=\"{{ article.title }}\" height=\"100\">
                        <div class=\"card-body\">
                            <h5 class=\"card-title\">{{article.title}}</h5>
                            <p class=\"card-text\">{{article.description|striptags|slice(0, 200)}}</p>
                            <a href=\"{{ path('article_show', {'id': article.id})}}\" class=\"btn btn-primary\">LIRE</a>
                        </div>
                    </div>
                {% endfor %}
            </div>
        {% endif %}

        <div class= \"row\">
            <a href=\"{{ path('user_index')}}\">
                <input type=\"button\" value=\"Retour à la liste\" />
            </a>
               <a href=\"{{ path('user_edit', {'id': user.id})}}\">
                <input type=\"button\" value=\"Modifier\" />
            </a>
        </div>
    </div>
{% endblock %}
", "user/show.html.twig", "/home/pascal/Rendu/ProjetCocoNuts/ProjetPognon/templates/user/show.html.twig");
    }
}
