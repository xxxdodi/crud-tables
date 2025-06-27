<?php include_once $_SERVER["DOCUMENT_ROOT"] . "/crud/templates/inc/header.php"; ?>

<div class="container my-5">
    <h1 class="text-center text-primary">
        <i class="bi bi-star-fill"></i> Рейтинг Машин
    </h1>
    <p class="text-muted text-center">Посмотрите отзывы и оценки для выбранной машины.</p>

    <?php if (isset($allCars)): ?>
        <form class="row row-cols-lg-auto g-3 align-items-center my-4 justify-content-center" name="ratingShow" method="post" action="/crud/">
            <div class="col-12">
                <div class="input-group shadow-sm">
                    <select class="form-select" aria-label="Выберите машину" name="carId">
                        <option selected disabled class="text-muted">Выберите машину</option>
                        <?php foreach ($allCars as $car): ?>
                            <option value="<?= intval($car->id) ?>"><?= htmlspecialchars($car->getCarName()) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="col-12">
                <button class="btn btn-success btn-lg shadow-sm" type="submit">
                    <i class="bi bi-search"></i> Показать рейтинг
                </button>
            </div>
        </form>
    <?php endif; ?>

    <?php if (!empty($details)): ?>
        <div class="table-responsive mt-4">
            <table class="table table-bordered table-striped shadow-sm align-middle">
                <thead class="table-primary text-center">
                <tr>
                    <th>Название машины</th>
                    <th>Дата изготовления</th>
                    <th>Покупатель</th>
                    <th>Название компании</th>
                    <th>Отзыв</th>
                    <th>Оценка</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($details as $detail): ?>
                    <tr class="text-center">
                        <td><?= htmlspecialchars($detail['car_name']) ?></td>
                        <td><?= htmlspecialchars($detail['car_release']) ?></td>
                        <td><?= htmlspecialchars($detail['buyer_name']) ?></td>
                        <td><?= htmlspecialchars($detail['companie_name']) ?></td>
                        <td class="text-start"><?= htmlspecialchars($detail['description']) ?></td>
                        <td><?= htmlspecialchars($detail['mark']) ?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php else: ?>
        <p class="text-muted text-center mt-4">
            <i class="bi bi-info-circle"></i> Данные не найдены.
        </p>
    <?php endif; ?>
</div>
