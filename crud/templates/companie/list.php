<?php include_once $_SERVER["DOCUMENT_ROOT"] . "/crud/templates/inc/header.php"; ?>

<div class="container mt-5">
    <div class="row">
        <div class="col-12 text-center">
            <h1 class="text-primary mb-4">Список Компаний</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <table class="table table-bordered table-hover table-striped shadow-sm">
                <thead class="table-primary text-center">
                <tr>
                    <th>ID</th>
                    <th>Название компании</th>
                    <th>Email</th>
                    <th colspan="2">Действия</th>
                </tr>
                </thead>
                <tbody>
                <?php if (isset($items) && is_array($items)): ?>
                    <?php foreach ($items as $companie): ?>
                        <tr>
                            <th class="text-center align-middle"><?= intval($companie->id) ?></th>
                            <td class="align-middle"><?= htmlspecialchars($companie->getCompanieName()) ?></td>
                            <td class="align-middle"><?= htmlspecialchars($companie->getEmail()) ?></td>
                            <td class="text-center align-middle">
                                <a class="btn btn-sm btn-success" href="/crud/companie/<?= intval($companie->id) ?>/edit">
                                    <i class="bi bi-pencil"></i> Редактировать
                                </a>
                            </td>
                            <td class="text-center align-middle">
                                <button class="btn btn-sm btn-danger delete" data-itemId="<?= intval($companie->id) ?>" data-EntityName="companie">
                                    <i class="bi bi-trash"></i> Удалить
                                </button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5" class="text-center text-muted">Нет данных для отображения.</td>
                    </tr>
                <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col-12 text-center">
            <a class="btn btn-primary px-5 py-2 shadow-sm" href="/crud/companie/add">
                <i class="bi bi-plus-circle"></i> Добавить компанию
            </a>
        </div>
    </div>
</div>
