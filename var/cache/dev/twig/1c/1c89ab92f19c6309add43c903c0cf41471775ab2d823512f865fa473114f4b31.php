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

/* user/partial/form.html.twig */
class __TwigTemplate_a8da93ebe0ce97025852a09c8c62d3d20d6a85f67e176f1efecfbedd2bff8123 extends Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "user/partial/form.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "user/partial/form.html.twig"));

        // line 1
        echo "
";
        // line 2
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 2, $this->source); })()), 'form_start', ["attr" => ["novalidate" => "novalidate"]]);
        echo "

<div class=\"row\">
    <div class = \"col-6\">
        ";
        // line 6
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 6, $this->source); })()), "username", [], "any", false, false, false, 6), 'label');
        echo "<br>
        ";
        // line 7
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 7, $this->source); })()), "username", [], "any", false, false, false, 7), 'widget', ["attr" => ["class" => "coconuts-input-article-title"]]);
        echo "
    </div>
    <div class = \"col-6\">
        ";
        // line 10
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 10, $this->source); })()), "password", [], "any", false, false, false, 10), 'label');
        echo "<br>
        ";
        // line 11
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 11, $this->source); })()), "password", [], "any", false, false, false, 11), 'widget', ["attr" => ["class" => "coconuts-input-article-title"]]);
        echo "
    </div>
</div>
<div class=\"row\">
</div>
<div class=\"row\">
    <div class = \"col-6\">
        ";
        // line 18
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 18, $this->source); })()), "email", [], "any", false, false, false, 18), 'label');
        echo "<br>
        ";
        // line 19
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 19, $this->source); })()), "email", [], "any", false, false, false, 19), 'widget', ["attr" => ["class" => "coconuts-input-article-title"]]);
        echo "
    </div>
    <div class = \"col-6\">
        ";
        // line 22
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 22, $this->source); })()), "imageFile", [], "any", false, false, false, 22), 'label');
        echo "<br>
        ";
        // line 23
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 23, $this->source); })()), "imageFile", [], "any", false, false, false, 23), 'widget', ["attr" => ["class" => "coconuts-image-article-upload"]]);
        echo "
    </div>
</div>
<div class=\"row\">
    <div class = \"col-12\">
        ";
        // line 28
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 28, $this->source); })()), "profileDescription", [], "any", false, false, false, 28), 'label');
        echo "<br>
        ";
        // line 29
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 29, $this->source); })()), "profileDescription", [], "any", false, false, false, 29), 'widget', ["attr" => ["class" => "coconuts-input-chapeau"]]);
        echo "
    </div>
</div>


<p class=\"text-center main-actions\">
    <a  class=\"btn btn-link\" href=\"";
        // line 35
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("article_index");
        echo "\">
        <i class=\"fa fa-arrow-left\"></i>
        Retour à l'accueil
    </a>

    <button type=\"submit\" class=\"btn btn-primary\">
        <i class=\"fas fa-save\"></i>
        Publier
    </button>
</p>

";
        // line 46
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 46, $this->source); })()), 'form_end');
        echo "


";
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "user/partial/form.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  126 => 46,  112 => 35,  103 => 29,  99 => 28,  91 => 23,  87 => 22,  81 => 19,  77 => 18,  67 => 11,  63 => 10,  57 => 7,  53 => 6,  46 => 2,  43 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("
{{ form_start(form, {attr : { novalidate : 'novalidate' }}) }}

<div class=\"row\">
    <div class = \"col-6\">
        {{ form_label(form.username)}}<br>
        {{ form_widget(form.username, {'attr': {'class': 'coconuts-input-article-title'}})}}
    </div>
    <div class = \"col-6\">
        {{ form_label(form.password)}}<br>
        {{ form_widget(form.password, {'attr': {'class': 'coconuts-input-article-title'}})}}
    </div>
</div>
<div class=\"row\">
</div>
<div class=\"row\">
    <div class = \"col-6\">
        {{ form_label(form.email)}}<br>
        {{ form_widget(form.email, {'attr': {'class': 'coconuts-input-article-title'}})}}
    </div>
    <div class = \"col-6\">
        {{ form_label(form.imageFile)}}<br>
        {{ form_widget(form.imageFile, {'attr': {'class': 'coconuts-image-article-upload'}})}}
    </div>
</div>
<div class=\"row\">
    <div class = \"col-12\">
        {{ form_label(form.profileDescription)}}<br>
        {{ form_widget(form.profileDescription, {'attr': {'class': 'coconuts-input-chapeau'}})}}
    </div>
</div>


<p class=\"text-center main-actions\">
    <a  class=\"btn btn-link\" href=\"{{ path('article_index')}}\">
        <i class=\"fa fa-arrow-left\"></i>
        Retour à l'accueil
    </a>

    <button type=\"submit\" class=\"btn btn-primary\">
        <i class=\"fas fa-save\"></i>
        Publier
    </button>
</p>

{{ form_end(form) }}


", "user/partial/form.html.twig", "/home/pascal/Rendu/ProjetCocoNuts/ProjetPognon/templates/user/partial/form.html.twig");
    }
}
