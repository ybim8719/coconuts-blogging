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
class __TwigTemplate_29fa90b3fd0e4636750f0e1cd2dca45210aa84d5c6606be5d12eb44f0d71d513 extends Template
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
<div class=\"coconuts-author-block\">
    <div class=\"coconuts-author-body\">
        <div class=\"coconuts-author-block-picture\">
            <img src=\"";
        // line 5
        echo twig_escape_filter($this->env, $this->extensions['Vich\UploaderBundle\Twig\Extension\UploaderExtension']->asset((isset($context["writer"]) || array_key_exists("writer", $context) ? $context["writer"] : (function () { throw new RuntimeError('Variable "writer" does not exist.', 5, $this->source); })())), "html", null, true);
        echo "\" alt=\"";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["writer"]) || array_key_exists("writer", $context) ? $context["writer"] : (function () { throw new RuntimeError('Variable "writer" does not exist.', 5, $this->source); })()), "username", [], "any", false, false, false, 5), "html", null, true);
        echo "\"
                 class=\"coconuts-round-picture small-img\" />
        </div>
        <div class=\"coconuts-author-block-description\">
            <div>COMPOSE PAR :</div>
            <div class=\"coconuts-author-block-follow\">
                <a href = \"";
        // line 11
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("user_show", ["id" => twig_get_attribute($this->env, $this->source, (isset($context["writer"]) || array_key_exists("writer", $context) ? $context["writer"] : (function () { throw new RuntimeError('Variable "writer" does not exist.', 11, $this->source); })()), "id", [], "any", false, false, false, 11)]), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["writer"]) || array_key_exists("writer", $context) ? $context["writer"] : (function () { throw new RuntimeError('Variable "writer" does not exist.', 11, $this->source); })()), "username", [], "any", false, false, false, 11), "html", null, true);
        echo "</a>
            </div>
            <div>";
        // line 13
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["writer"]) || array_key_exists("writer", $context) ? $context["writer"] : (function () { throw new RuntimeError('Variable "writer" does not exist.', 13, $this->source); })()), "profileDescription", [], "any", false, false, false, 13), "html", null, true);
        echo "</div>
        </div>
        <div class =\"coconuts-author-block-follow\">
            <a href=\"javascript:void(0)\"
               class= \"coconuts-follow-button
               ";
        // line 18
        echo ((0 === twig_compare((isset($context["isFollowing"]) || array_key_exists("isFollowing", $context) ? $context["isFollowing"] : (function () { throw new RuntimeError('Variable "isFollowing" does not exist.', 18, $this->source); })()), false)) ? ("follow") : ("unfollow"));
        echo "\"
            >
                ";
        // line 20
        echo ((0 === twig_compare((isset($context["isFollowing"]) || array_key_exists("isFollowing", $context) ? $context["isFollowing"] : (function () { throw new RuntimeError('Variable "isFollowing" does not exist.', 20, $this->source); })()), false)) ? ("S'abonner") : ("Se désabonner"));
        echo "
            </a>
        </div>
    </div>
    <div class=\"coconuts-author-block-footer\">
        <div>Inscrit depuis le : ";
        // line 25
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["writer"]) || array_key_exists("writer", $context) ? $context["writer"] : (function () { throw new RuntimeError('Variable "writer" does not exist.', 25, $this->source); })()), "createdAt", [], "any", false, false, false, 25), "m/d/Y"), "html", null, true);
        echo "</div>
        <div class=\"coconuts-author-block-activity\">
            <div>";
        // line 27
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["writer"]) || array_key_exists("writer", $context) ? $context["writer"] : (function () { throw new RuntimeError('Variable "writer" does not exist.', 27, $this->source); })()), "nbOfArticles", [], "any", false, false, false, 27), "html", null, true);
        echo " Articles écrits</div>
            <div>";
        // line 28
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["writer"]) || array_key_exists("writer", $context) ? $context["writer"] : (function () { throw new RuntimeError('Variable "writer" does not exist.', 28, $this->source); })()), "nbOfIncomingFollows", [], "any", false, false, false, 28), "html", null, true);
        echo " Abonnés</div>
            <div>";
        // line 29
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["writer"]) || array_key_exists("writer", $context) ? $context["writer"] : (function () { throw new RuntimeError('Variable "writer" does not exist.', 29, $this->source); })()), "nbOfSubscribedFollows", [], "any", false, false, false, 29), "html", null, true);
        echo " Abonnements</div>
        </div>
    </div>
    <input id=\"isFollowing\" type=\"hidden\" value = \"";
        // line 32
        echo ((0 === twig_compare((isset($context["isFollowing"]) || array_key_exists("isFollowing", $context) ? $context["isFollowing"] : (function () { throw new RuntimeError('Variable "isFollowing" does not exist.', 32, $this->source); })()), false)) ? ("0") : ("1"));
        echo "\">
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
        return array (  107 => 32,  101 => 29,  97 => 28,  93 => 27,  88 => 25,  80 => 20,  75 => 18,  67 => 13,  60 => 11,  49 => 5,  43 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("
<div class=\"coconuts-author-block\">
    <div class=\"coconuts-author-body\">
        <div class=\"coconuts-author-block-picture\">
            <img src=\"{{ vich_uploader_asset(writer) }}\" alt=\"{{ writer.username }}\"
                 class=\"coconuts-round-picture small-img\" />
        </div>
        <div class=\"coconuts-author-block-description\">
            <div>COMPOSE PAR :</div>
            <div class=\"coconuts-author-block-follow\">
                <a href = \"{{ path('user_show', {'id': writer.id}) }}\">{{ writer.username }}</a>
            </div>
            <div>{{writer.profileDescription}}</div>
        </div>
        <div class =\"coconuts-author-block-follow\">
            <a href=\"javascript:void(0)\"
               class= \"coconuts-follow-button
               {{ isFollowing == false ? 'follow' : 'unfollow' }}\"
            >
                {{ isFollowing == false ? \"S\\'abonner\" : 'Se désabonner'  }}
            </a>
        </div>
    </div>
    <div class=\"coconuts-author-block-footer\">
        <div>Inscrit depuis le : {{writer.createdAt|date(\"m/d/Y\")}}</div>
        <div class=\"coconuts-author-block-activity\">
            <div>{{writer.nbOfArticles}} Articles écrits</div>
            <div>{{writer.nbOfIncomingFollows}} Abonnés</div>
            <div>{{writer.nbOfSubscribedFollows}} Abonnements</div>
        </div>
    </div>
    <input id=\"isFollowing\" type=\"hidden\" value = \"{{ isFollowing == false  ? \"0\" : \"1\"}}\">
</div>
", "writer/partial/display_partial_writer_resume_bloc.html.twig", "/home/pascal/Rendu/ProjetCocoNuts/ProjetPognon/templates/writer/partial/display_partial_writer_resume_bloc.html.twig");
    }
}
