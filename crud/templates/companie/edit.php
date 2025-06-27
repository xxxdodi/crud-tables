<?php include_once $_SERVER["DOCUMENT_ROOT"] ."/crud/templates/inc/header.php"?>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/crud/companie">Компании</a></li>
        <li class="breadcrumb-item active" aria-current="page">Редактирование компании <?=$data[0]["currentItem"]->getCompanieName()?></li>
    </ol>
</nav>
<?php if(isset($data[0]['errors']) && is_array($data[0]['errors'])): ?>
    <div class="alert alert-danger" role="alert" >
        <ul>
            <?php foreach ($data[1]["errors"] as $error): ?>
                <li><?=$error?></li>
            <?php endforeach;?>
        </ul>
    </div>
<?php endif?>
<form class="row g-3 bg-light p-4 rounded shadow-sm" name="editCompanie" method="post"
      action="/crud/companie/<?= intval($data[0]['currentItem']->id) ?>/edit">
    <div class="col-12">
        <h2 class="mb-4 text-center text-primary">Редактировать компанию</h2>
    </div>
    <div class="col-md-6">
        <label for="companieName" class="form-label fw-bold">Название компании</label>
        <input type="text" id="companieName" class="form-control" placeholder="Название компании"
               name="setCompanieName" maxlength="60"
               value="<?= htmlspecialchars($data[0]['currentItem']->getCompanieName()) ?>"
               title="Название компании" required>
    </div>
    <div class="col-md-6">
        <label for="email" class="form-label fw-bold">Email</label>
        <input type="email" id="email" class="form-control" placeholder="Email компании"
               name="setEmail" maxlength="255"
               value="<?= htmlspecialchars($data[0]['currentItem']->getEmail()) ?>"
               title="Email компании" required>
    </div>
    <div class="col-12 text-center mt-3">
        <button class="btn btn-primary px-5 py-2" type="submit">Сохранить изменения</button>
    </div>
</form>

