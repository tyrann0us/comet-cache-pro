<?php
/*[pro strip-from="lite"]*/
namespace WebSharks\ZenCache\Pro;

/*
 * Wipes out entire CDN cache.
 *
 * @since 15xxxx Implementing CDN cache wiping.
 *
 * @param bool $manually TRUE if the wiping is done manually by the site owner.
 * @param boolean $maybe Defaults to a true value.
 *
 * @throws \Exception If a wipe failure occurs.
 *
 * @return integer CDN invalidation counter after wiping.
 */
$self->wipeCdnCache = function ($manually = false, $maybe = true) use ($self) {
    if (!$self->options['cdn_enable']) {
        return (integer) $self->options['cdn_invalidation_counter'];
    }
    if ($maybe && !$self->options['cache_clear_cdn_enable']) {
        return (integer) $self->options['cdn_invalidation_counter'];
    }
    $self->updateOptions(array('cdn_invalidation_counter' => ++$self->options['cdn_invalidation_counter']));

    return (integer) $self->options['cdn_invalidation_counter'];
};

/*
 * Clears the CDN cache.
 *
 * @since 15xxxx Implementing CDN cache clearing.
 *
 * @param bool $manually TRUE if the clearing is done manually by the site owner.
 * @param boolean $maybe Defaults to a true value.
 *
 * @throws \Exception If a clear failure occurs.
 *
 * @return integer CDN invalidation counter after clearing.
 */
$self->clearCdnCache = function ($manually = false, $maybe = true) use ($self) {
    return $self->wipeCdnCache($manually, $maybe);
};
/*[/pro]*/
