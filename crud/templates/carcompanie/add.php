<?php include_once $_SERVER["DOCUMENT_ROOT"] ."/crud/templates/inc/header.php"?>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/crud/carcompanie">Связи</a></li>
        <li class="breadcrumb-item active" aria-current="page">Новая связь</li>
    </ol>
</nav>
<?php if (isset($data[0]['errors']) && is_array($data[0]['errors'])): ?>
    <div class="alert alert-danger" role="alert">
        <ul>
            <?php foreach ($data[0]['errors'] as $error): ?>
                <li><?= htmlspecialchars($error) ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>
<form class="row g-3 bg-light p-4 rounded shadow-sm" name="addLink" method="post" action="/crud/carcompanie/add">
    <div class="col-12">
        <h2 class="mb-4 text-center text-primary">Связать машину и компанию</h2>
    </div>
    <div class="col-md-6">
        <label for="carSelect" class="form-label fw-bold">Выберите машину</label>
        <select class="form-select" id="carSelect" aria-label="Машина" name="setCarId" title="Машина" required>
            <?php if (isset($data[0])): ?>
                <?php foreach ($data[0]["allCars"] as $car): ?>
                    <option value="<?= intval($car->id) ?>"><?= htmlspecialchars($car->getCarName()) ?></option>
                <?php endforeach; ?>
            <?php endif; ?>
        </select>
    </div>
    <div class="col-md-6">
        <label for="companieSelect" class="form-label fw-bold">Выберите компанию</label>
        <select class="form-select" id="companieSelect" aria-label="Компания" name="setCompanieId" title="Компания" required>
            <?php if (isset($data[1])): ?>
                <?php foreach ($data[1]["allCompanies"] as $companie): ?>
                    <option value="<?= intval($companie->id) ?>"><?= htmlspecialchars($companie->getCompanieName()) ?></option>
                <?php endforeach; ?>
            <?php endif; ?>
        </select>
    </div>
    <div class="col-12 text-center mt-3">
        <button class="btn btn-primary px-5 py-2" type="submit">Отправить</button>
    </div>
</form>


