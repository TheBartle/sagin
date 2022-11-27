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

/* navigation/main.twig */
class __TwigTemplate_102bb0422384326b35ac0bb17f4ace6a extends Template
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
        // line 1
        if ( !($context["is_ajax"] ?? null)) {
            // line 2
            echo "  <div id=\"pma_navigation\" class=\"d-print-none\" data-config-navigation-width=\"";
            echo twig_escape_filter($this->env, ($context["config_navigation_width"] ?? null), "html", null, true);
            echo "\">
    <div id=\"pma_navigation_resizer\"></div>
    <div id=\"pma_navigation_collapser\"></div>
    <div id=\"pma_navigation_content\">
      <div id=\"pma_navigation_header\">

        ";
            // line 8
            if (twig_get_attribute($this->env, $this->source, ($context["logo"] ?? null), "is_displayed", [], "any", false, false, false, 8)) {
                // line 9
                echo "          <div id=\"pmalogo\">
            ";
                // line 10
                if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, ($context["logo"] ?? null), "source", [], "any", false, false, false, 10))) {
                    // line 11
                    echo "              <img id=\"imgpmalogo\" src=\"";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["logo"] ?? null), "source", [], "any", false, false, false, 11), "html", null, true);
                    echo "\" alt=\"phpMyAdmin\">
            ";
                } else {
                    // line 13
                    echo "              <h1>phpMyAdmin</h1>
            ";
                }
                // line 15
                echo "          </div>
        ";
            }
            // line 17
            echo "
        <div id=\"navipanellinks\">
          <a href=\"";
            // line 19
            echo PhpMyAdmin\Url::getFromRoute("/");
            echo "\" title=\"";
echo _gettext("Home");
            echo "\">";
            // line 20
            echo PhpMyAdmin\Html\Generator::getImage("b_home", _gettext("Home"));
            // line 21
            echo "</a>

          ";
            // line 23
            if ((($context["server"] ?? null) != 0)) {
                // line 24
                echo "            <a class=\"logout disableAjax\" href=\"";
                echo PhpMyAdmin\Url::getFromRoute("/logout");
                echo "\" title=\"";
                echo twig_escape_filter($this->env, (((($context["auth_type"] ?? null) == "config")) ? (_gettext("Empty session data")) : (_gettext("Log out"))), "html", null, true);
                echo "\">";
                // line 25
                echo PhpMyAdmin\Html\Generator::getImage("s_loggoff", (((($context["auth_type"] ?? null) == "config")) ? (_gettext("Empty session data")) : (_gettext("Log out"))));
                // line 26
                echo "</a>
          ";
            }
            // line 28
            echo "
          <a href=\"";
            // line 29
            echo PhpMyAdmin\Html\MySQLDocumentation::getDocumentationLink("index");
            echo "\" title=\"";
echo _gettext("phpMyAdmin documentation");
            echo "\" target=\"_blank\" rel=\"noopener noreferrer\">";
            // line 30
            echo PhpMyAdmin\Html\Generator::getImage("b_docs", _gettext("phpMyAdmin documentation"));
            // line 31
            echo "</a>

          <a href=\"";
            // line 33
            echo PhpMyAdmin\Util::getdocuURL(($context["is_mariadb"] ?? null));
            echo "\" title=\"";
            echo twig_escape_filter($this->env, ((($context["is_mariadb"] ?? null)) ? (_gettext("MariaDB Documentation")) : (_gettext("MySQL Documentation"))), "html", null, true);
            echo "\" target=\"_blank\" rel=\"noopener noreferrer\">";
            // line 34
            echo PhpMyAdmin\Html\Generator::getImage("b_sqlhelp", ((($context["is_mariadb"] ?? null)) ? (_gettext("MariaDB Documentation")) : (_gettext("MySQL Documentation"))));
            // line 35
            echo "</a>

          <a id=\"pma_navigation_settings_icon\"";
            // line 37
            echo (( !($context["is_navigation_settings_enabled"] ?? null)) ? (" class=\"hide\"") : (""));
            echo " href=\"#\" title=\"";
echo _gettext("Navigation panel settings");
            echo "\">";
            // line 38
            echo PhpMyAdmin\Html\Generator::getImage("s_cog", _gettext("Navigation panel settings"));
            // line 39
            echo "</a>

          <a id=\"pma_navigation_reload\" href=\"#\" title=\"";
echo _gettext("Reload navigation panel");
            // line 41
            echo "\">";
            // line 42
            echo PhpMyAdmin\Html\Generator::getImage("s_reload", _gettext("Reload navigation panel"));
            // line 43
            echo "</a>
        </div>

        ";
            // line 46
            if ((($context["is_servers_displayed"] ?? null) && (twig_length_filter($this->env, ($context["servers"] ?? null)) > 1))) {
                // line 47
                echo "          <div id=\"serverChoice\">
            ";
                // line 48
                echo ($context["server_select"] ?? null);
                echo "
          </div>
        ";
            }
            // line 51
            echo "
        ";
            // line 52
            echo PhpMyAdmin\Html\Generator::getImage("ajax_clock_small", _gettext("Loading…"), ["style" => "visibility: hidden; display:none", "class" => "throbber"]);
            // line 55
            echo "
      </div>
      <div id=\"pma_navigation_tree\" class=\"list_container";
            // line 57
            echo ((($context["is_synced"] ?? null)) ? (" synced") : (""));
            echo ((($context["is_highlighted"] ?? null)) ? (" highlight") : (""));
            echo ((($context["is_autoexpanded"] ?? null)) ? (" autoexpand") : (""));
            echo "\">
";
        }
        // line 59
        echo "
";
        // line 60
        if ( !($context["navigation_tree"] ?? null)) {
            // line 61
            echo "  ";
            echo call_user_func_array($this->env->getFilter('error')->getCallable(), [_gettext("An error has occurred while loading the navigation display")]);
            echo "
";
        } else {
            // line 63
            echo "  ";
            echo ($context["navigation_tree"] ?? null);
            echo "
";
        }
        // line 65
        echo "
";
        // line 66
        if ( !($context["is_ajax"] ?? null)) {
            // line 67
            echo "      </div>

      <div id=\"pma_navi_settings_container\">
        ";
            // line 70
            if (($context["is_navigation_settings_enabled"] ?? null)) {
                // line 71
                echo "          ";
                echo ($context["navigation_settings"] ?? null);
                echo "
        ";
            }
            // line 73
            echo "      </div>
    </div>

    ";
            // line 76
            if (($context["is_drag_drop_import_enabled"] ?? null)) {
                // line 77
                echo "      <div class=\"pma_drop_handler\">
        ";
echo _gettext("Drop files here");
                // line 79
                echo "      </div>
      <div class=\"pma_sql_import_status\">
        <h2>
          ";
echo _gettext("SQL upload");
                // line 83
                echo "          ( <span class=\"pma_import_count\">0</span> )
          <span class=\"close\">x</span>
          <span class=\"minimize\">-</span>
        </h2>
        <div></div>
      </div>
    ";
            }
            // line 90
            echo "  </div>
  ";
            // line 91
            echo twig_include($this->env, $context, "modals/unhide_nav_item.twig");
            echo "
";
        }
    }

    public function getTemplateName()
    {
        return "navigation/main.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  236 => 91,  233 => 90,  224 => 83,  218 => 79,  214 => 77,  212 => 76,  207 => 73,  201 => 71,  199 => 70,  194 => 67,  192 => 66,  189 => 65,  183 => 63,  177 => 61,  175 => 60,  172 => 59,  165 => 57,  161 => 55,  159 => 52,  156 => 51,  150 => 48,  147 => 47,  145 => 46,  140 => 43,  138 => 42,  136 => 41,  131 => 39,  129 => 38,  124 => 37,  120 => 35,  118 => 34,  113 => 33,  109 => 31,  107 => 30,  102 => 29,  99 => 28,  95 => 26,  93 => 25,  87 => 24,  85 => 23,  81 => 21,  79 => 20,  74 => 19,  70 => 17,  66 => 15,  62 => 13,  56 => 11,  54 => 10,  51 => 9,  49 => 8,  39 => 2,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "navigation/main.twig", "/var/www/phpmyadmin/templates/navigation/main.twig");
    }
}
