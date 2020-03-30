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

/* writer/partial/display_partial_writer_resume_bloc.html.twig */
class __TwigTemplate_9a59a84132a4d262258d7a07fe2aa651ce06201a680625fc1e37e202fb16db60 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "writer/partial/display_partial_writer_resume_bloc.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "writer/partial/display_partial_writer_resume_bloc.html.twig"));

        // line 1
        echo "
<div>
    <div>A propos de l'auteur :</div>
    <div>
        <img src=\"";
        // line 5
        echo twig_escape_filter($this->env, $this->extensions['Vich\UploaderBundle\Twig\Extension\UploaderExtension']->asset((isset($context["writer"]) || array_key_exists("writer", $context) ? $context["writer"] : (function () { throw new RuntimeError('Variable "writer" does not exist.', 5, $this->source); })())), "html", null, true);
        echo "\" alt=\"";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["writer"]) || array_key_exists("writer", $context) ? $context["writer"] : (function () { throw new RuntimeError('Variable "writer" does not exist.', 5, $this->source); })()), "username", [], "any", false, false, false, 5), "html", null, true);
        echo "\"
             class=\"coconuts-writer-mini-picture\" />
        <a href = \"";
        // line 7
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("user_show", ["id" => twig_get_attribute($this->env, $this->source, (isset($context["writer"]) || array_key_exists("writer", $context) ? $context["writer"] : (function () { throw new RuntimeError('Variable "writer" does not exist.', 7, $this->source); })()), "id", [], "any", false, false, false, 7)]), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["writer"]) || array_key_exists("writer", $context) ? $context["writer"] : (function () { throw new RuntimeError('Variable "writer" does not exist.', 7, $this->source); })()), "username", [], "any", false, false, false, 7), "html", null, true);
        echo "</a>
        <button class=\"coconuts_follow_writer button-block\" ";
        // line 8
        if ((null === twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 8, $this->source); })()), "user", [], "any", false, false, false, 8))) {
            echo " disabled
        ";
        } else {
            // line 9
            echo " data-id =";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 9, $this->source); })()), "user", [], "any", false, false, false, 9), "id", [], "any", false, false, false, 9), "html", null, true);
            echo " ";
        }
        echo ">
            Follow
        </button>
    </div>
    <div>";
        // line 13
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["writer"]) || array_key_exists("writer", $context) ? $context["writer"] : (function () { throw new RuntimeError('Variable "writer" does not exist.', 13, $this->source); })()), "profileDescription", [], "any", false, false, false, 13), "html", null, true);
        echo "</div>
    <div>Inscrit depuis le : ";
        // line 14
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["writer"]) || array_key_exists("writer", $context) ? $context["writer"] : (function () { throw new RuntimeError('Variable "writer" does not exist.', 14, $this->source); })()), "createdAt", [], "any", false, false, false, 14), "m/d/Y"), "html", null, true);
        echo "</div>
    <div class=\"row\">
        <div>";
        // line 16
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["writer"]) || array_key_exists("writer", $context) ? $context["writer"] : (function () { throw new RuntimeError('Variable "writer" does not exist.', 16, $this->source); })()), "nbOfArticles", [], "any", false, false, false, 16), "html", null, true);
        echo " Articles écrits</div>
        <div>";
        // line 17
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["writer"]) || array_key_exists("writer", $context) ? $context["writer"] : (function () { throw new RuntimeError('Variable "writer" does not exist.', 17, $this->source); })()), "nbOfIncomingFollows", [], "any", false, false, false, 17), "html", null, true);
        echo " Abonnés</div>
        <div>";
        // line 18
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["writer"]) || array_key_exists("writer", $context) ? $context["writer"] : (function () { throw new RuntimeError('Variable "writer" does not exist.', 18, $this->source); })()), "nbOfSubscribedFollows", [], "any", false, false, false, 18), "html", null, true);
        echo " Abonnements</div>
    </div>
</div>
";
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "writer/partial/display_partial_writer_resume_bloc.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  94 => 18,  90 => 17,  86 => 16,  81 => 14,  77 => 13,  67 => 9,  62 => 8,  56 => 7,  49 => 5,  43 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("
<div>
    <div>A propos de l'auteur :</div>
    <div>
        <img src=\"{{ vich_uploader_asset(writer) }}\" alt=\"{{ writer.username }}\"
             class=\"coconuts-writer-mini-picture\" />
        <a href = \"{{ path('user_show', {'id': writer.id}) }}\">{{ writer.username }}</a>
        <button class=\"coconuts_follow_writer button-block\" {% if app.user is null %} disabled
        {% else %} data-id ={{app.user.id}} {% endif %}>
            Follow
        </button>
    </div>
    <div>{{writer.profileDescription}}</div>
    <div>Inscrit depuis le : {{writer.createdAt|date(\"m/d/Y\")}}</div>
    <div class=\"row\">
        <div>{{writer.nbOfArticles}} Articles écrits</div>
        <div>{{writer.nbOfIncomingFollows}} Abonnés</div>
        <div>{{writer.nbOfSubscribedFollows}} Abonnements</div>
    </div>
</div>
", "writer/partial/display_partial_writer_resume_bloc.html.twig", "/home/pascal/Rendu/ProjetCocoNuts/ProjetPognon/templates/writer/partial/display_partial_writer_resume_bloc.html.twig");
    }
}
