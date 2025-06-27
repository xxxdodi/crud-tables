<?php include_once $_SERVER["DOCUMENT_ROOT"] ."/crud/templates/inc/header.php"?>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/crud/mark">Оценки</a></li>
        <li class="breadcrumb-item active" aria-current="page">Новая оценка</li>
    </ol>
</nav>
<?php if(isset($data[2]["errors"])): ?>
    <div class="alert alert-danger" role="alert" >
        <ul>
            <?php foreach ($data[2]["errors"] as $error): ?>
                <li><?=$error?></li>
            <?php endforeach;?>
        </ul>
    </div>
<?php endif?>
<form class="row g-3 bg-light p-4 rounded shadow-sm" name="addMark" method="post" action="/crud/mark/add">
    <div class="col-12">
        <h2 class="mb-4 text-center text-primary">Добавить оценку</h2>
    </div>
    <div class="col-md-6">
        <label for="buyerSelect" class="form-label fw-bold">Выберите покупателя</label>
        <select id="buyerSelect" class="form-select" aria-label="Покупатель" name="setBuyerId" title="Имя покупателя" required>
            <?php if (isset($data[0]["allBuyers"])): ?>
                <?php foreach ($data[0]["allBuyers"] as $buyer): ?>
                    <option value="<?= intval($buyer->id) ?>"><?= htmlspecialchars($buyer->getBuyerName()) ?></option>
                <?php endforeach; ?>
            <?php endif; ?>
        </select>
    </div>
    <div class="col-md-6">
        <label for="companieSelect" class="form-label fw-bold">Выберите компанию</label>
        <select id="companieSelect" class="form-select" aria-label="Компания" name="setCompanieId" title="Компания" required>
            <?php if (isset($data[1]["allCompanies"])): ?>
                <?php foreach ($data[1]["allCompanies"] as $companie): ?>
                    <option value="<?= intval($companie->id) ?>"><?= htmlspecialchars($companie->getCompanieName()) ?></option>
                <?php endforeach; ?>
            <?php endif; ?>
        </select>
    </div>
    <div class="col-md-6">
        <label for="markInput" class="form-label fw-bold">Оценка</label>
        <input id="markInput" type="text" class="form-control" placeholder="Введите оценку" name="setMark" maxlength="1" title="Оценка" required>
    </div>
    <div class="col-md-6">
        <label for="descriptionInput" class="form-label fw-bold">Отзыв</label>
        <input id="descriptionInput" type="text" class="form-control" placeholder="Введите отзыв" name="setDescription" maxlength="50" title="Отзыв" required>
    </div>
    <div class="col-12 text-center mt-3">
        <button class="btn btn-primary px-5 py-2" type="submit">Отправить</button>
    </div>
</form>

