<?php
return [
    '~^car$~' => [\controllers\carcontroller::class, 'showAll'],
    '~^car\/add$~' => [\controllers\carcontroller::class, 'add'],
    '~^car\/(\d+)\/edit$~' => [\controllers\carcontroller::class, 'edit'],
    '~^car\/(\d+)\/delete$~' => [\controllers\carcontroller::class, 'delete'],

    '~^buyer$~' => [\controllers\buyercontroller::class, 'showAll'],
    '~^buyer\/(\d+)\/edit$~' => [\controllers\buyercontroller::class, 'edit'],
    '~^buyer\/(\d+)\/delete$~' => [\controllers\buyercontroller::class, 'delete'],
    '~^buyer\/add$~' => [\controllers\buyercontroller::class, 'add'],

    '~^companie$~' => [\controllers\companiecontroller::class, 'showAll'],
    '~^companie\/add$~' => [\controllers\companiecontroller::class, 'add'],
    '~^companie\/(\d+)\/edit$~' => [\controllers\companiecontroller::class, 'edit'],
    '~^companie\/(\d+)\/delete$~' => [\controllers\companiecontroller::class, 'delete'],

    '~^carcompanie$~' => [\controllers\carcompaniecontroller::class, 'showAll'],
    '~^carcompanie\/add$~' => [\controllers\carcompaniecontroller::class, 'add'],
    '~^carcompanie\/(\d+)\/edit$~' => [\controllers\carcompaniecontroller::class, 'edit'],
    '~^carcompanie\/(\d+)\/delete$~' => [\controllers\carcompaniecontroller::class, 'delete'],

    '~^mark$~' => [\controllers\markcontroller::class, 'showAll'],
    '~^mark\/add$~' => [\controllers\markcontroller::class, 'add'],
    '~^mark\/(\d+)\/edit$~' => [\controllers\markcontroller::class, 'edit'],
    '~^mark\/(\d+)\/delete$~' => [\controllers\markcontroller::class, 'delete'],

    '~^$~' => [\controllers\maincontroller::class, 'showRating'],
]
?>