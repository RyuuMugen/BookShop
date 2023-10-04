<div class="sidebar menu-container">
    <h3 class="title">MENU</h3>
    <ul class="menu">
        <?php foreach ($data["category"] as $value) : ?>
            <li class="menu-item">
                <a href="<?= URL ?>index.php/home/category?category=<?= $value["id"] ?>&page=1" class="menu-link"><?= $value["category_name"] ?></a>
            </li>
        <?php endforeach; ?>
    </ul>
</div>
