<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\ContainerMUqkbdu\srcApp_KernelDevDebugContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/ContainerMUqkbdu/srcApp_KernelDevDebugContainer.php') {
    touch(__DIR__.'/ContainerMUqkbdu.legacy');

    return;
}

if (!\class_exists(srcApp_KernelDevDebugContainer::class, false)) {
    \class_alias(\ContainerMUqkbdu\srcApp_KernelDevDebugContainer::class, srcApp_KernelDevDebugContainer::class, false);
}

return new \ContainerMUqkbdu\srcApp_KernelDevDebugContainer([
    'container.build_hash' => 'MUqkbdu',
    'container.build_id' => '6bcf2502',
    'container.build_time' => 1570979214,
], __DIR__.\DIRECTORY_SEPARATOR.'ContainerMUqkbdu');
