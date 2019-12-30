<?php
/**
 * @param string|null $paran
 * @return string
 *
 */
function site(string $paran = null): string
{
    if($paran && !empty(SITE[$paran]))
    {
        $p = SITE[$paran];
    }
    else
    {
        $p = SITE["root"];
    }

    return $p;
}

/**
 * @param string $path
 * @return string
 */
function asset(string $path): string
{
    $pa = SITE["root"]."views/assets/{$path}";
    return $pa;
}

/**
 * @param string|null $type
 * @param string|null $message
 * @return string|null
 */
function flash(string $type = null, string $message = null): ?string
{
    if($type && $message){
        $_SESSION["flash"] = [
          "type" => $type,
          "message" => $message
        ];

         return null;
    }
    if(!empty($_SESSION["flash"]) && $flash = $_SESSION["flash"]){
        unset($_SESSION["flash"]);
        return "<div class=\"message {$flash["type"]}\">{$flash["message"]}</div>";
    }

    return null;
}
