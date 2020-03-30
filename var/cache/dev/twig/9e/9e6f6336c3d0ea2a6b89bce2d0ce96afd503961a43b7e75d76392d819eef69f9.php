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

/* article//partials/form.html.twig */
class __TwigTemplate_91e21cd1a2505e42fb3157716173284f1c598b79c9e242d4a00f3ce133ac43cd extends Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "article//partials/form.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "article//partials/form.html.twig"));

        // line 1
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 1, $this->source); })()), 'form_start', ["attr" => ["novalidate" => "novalidate"]]);
        echo "

<div class=\"row\">
    <div class = \"col-12\">
        ";
        // line 5
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 5, $this->source); })()), "title", [], "any", false, false, false, 5), 'label');
        echo "<br>
        ";
        // line 6
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 6, $this->source); })()), "title", [], "any", false, false, false, 6), 'widget', ["attr" => ["class" => "coconuts-input-article-title"]]);
        echo "
    </div>

</div>
<div class=\"row\">
    <div class = \"col-12\">
        ";
        // line 12
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 12, $this->source); })()), "chapeau", [], "any", false, false, false, 12), 'label');
        echo "<br>
        ";
        // line 13
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 13, $this->source); })()), "chapeau", [], "any", false, false, false, 13), 'widget', ["attr" => ["class" => "coconuts-input-chapeau"]]);
        echo "
    </div>
</div>
<div class=\"row\">
    <div class = \"col-12\">
        ";
        // line 18
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 18, $this->source); })()), "description", [], "any", false, false, false, 18), 'label');
        echo "<br>
        ";
        // line 19
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 19, $this->source); })()), "description", [], "any", false, false, false, 19), 'widget', ["attr" => ["class" => "coconuts-input-article-body"]]);
        echo "
    </div>
</div>
<div class=\"row\">
    <div class = \"col-12\">
        ";
        // line 24
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 24, $this->source); })()), "imageFile", [], "any", false, false, false, 24), 'label');
        echo "<br>
        ";
        // line 25
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 25, $this->source); })()), "imageFile", [], "any", false, false, false, 25), 'widget', ["attr" => ["class" => "coconuts-image-article-upload"]]);
        echo "
    </div>
</div>

<p class=\"text-center main-actions\">
    <a  class=\"btn btn-link\" href=\"";
        // line 30
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
        // line 41
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 41, $this->source); })()), 'form_end');
        echo "


";
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "article//partials/form.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  113 => 41,  99 => 30,  91 => 25,  87 => 24,  79 => 19,  75 => 18,  67 => 13,  63 => 12,  54 => 6,  50 => 5,  43 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{{ form_start(form, {attr : { novalidate : 'novalidate' }}) }}

<div class=\"row\">
    <div class = \"col-12\">
        {{ form_label(form.title)}}<br>
        {{ form_widget(form.title, {'attr': {'class': 'coconuts-input-article-title'}})}}
    </div>

</div>
<div class=\"row\">
    <div class = \"col-12\">
        {{ form_label(form.chapeau)}}<br>
        {{ form_widget(form.chapeau, {'attr': {'class': 'coconuts-input-chapeau'}})}}
    </div>
</div>
<div class=\"row\">
    <div class = \"col-12\">
        {{ form_label(form.description)}}<br>
        {{ form_widget(form.description, {'attr': {'class': 'coconuts-input-article-body'}})}}
    </div>
</div>
<div class=\"row\">
    <div class = \"col-12\">
        {{ form_label(form.imageFile)}}<br>
        {{ form_widget(form.imageFile, {'attr': {'class': 'coconuts-image-article-upload'}})}}
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


", "article//partials/form.html.twig", "/home/pascal/Rendu/ProjetCocoNuts/ProjetPognon/templates/article/partials/form.html.twig");
    }
}
