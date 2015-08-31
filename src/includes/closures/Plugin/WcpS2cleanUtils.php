<?php
/*[pro strip-from="lite"]*/
namespace WebSharks\ZenCache\Pro;

/*
 * Wipe (i.e., reset) s2Clean cache.
 *
 * @since 15xxxx While adding OPCache support.
 *
 * @param boolean $maybe Defaults to a true value.
 *
 * @param integer Total files wiped in s2Clean.
 */
$self->wipeS2CleanCache = function ($maybe = true) use ($self) {
    $counter = 0; // Initialize counter.

    if ($maybe && !$self->options['cache_clear_s2clean_enable']) {
        return $counter; // Not enabled at this time.
    }
    if (!$self->functionIsPossible('s2clean')) {
        return $counter; // Not possible.
    }
    $counter += s2clean()->md_cache_clear();

    return $counter;
};

/*
 * Clear (i.e., reset) s2Clean cache.
 *
 * @since 15xxxx While adding OPCache support.
 *
 * @param boolean $maybe Defaults to a true value.
 *
 * @param integer Total files cleared in s2Clean.
 */
$self->clearS2CleanCache = function ($maybe = true) use ($self) {
    if (!is_multisite() || is_main_site() || current_user_can($self->network_cap)) {
        return $self->wipeS2CleanCache($maybe);
    }
    return 0; // Not applicable.
};
/*[/pro]*/
