<?php
namespace WebSharks\ZenCache\Pro;

/*
 * All post statuses.
 *
 * @since 15xxxx Improving bbPress support.
 *
 * @return array All post statuses.
 */
$self->postStatuses = function () use ($self) {
    if (!is_null($statuses = &$self->cacheKey('postStatuses'))) {
        return $statuses; // Already did this.
    }
    $statuses = get_post_stati();
    $statuses = array_keys($statuses);

    return $statuses;
};

/*
 * All built-in post statuses.
 *
 * @since 15xxxx Improving bbPress support.
 *
 * @return array All built-in post statuses.
 */
$self->builtInPostStatuses = function () use ($self) {
    if (!is_null($statuses = &$self->cacheKey('builtInPostStatuses'))) {
        return $statuses; // Already did this.
    }
    $statuses = array(); // Initialize.

    foreach (get_post_stati(array(), 'objects') as $_key => $_status) {
        if (!empty($_status->_builtin)) {
            $statuses[] = $_status->name;
        }
    }
    unset($_key, $_status); // Housekeeping.

    return $statuses;
};
