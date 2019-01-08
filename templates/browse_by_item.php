<?= render("header") ?>

<h1>Warframe:<br>Fantastic Items and Where to Find Them</h1>

<form onsubmit="return false">
    <fieldset>
        <label>What are you looking for?</label>
        <input type="text" name="pattern">
    </fieldset>
</form>

<div class="flex row container">
    <code id="results1" onclick="showSourceInfo(event)"></code>
    <code id="results2" onclick="showSourceInfo(event)"></code>
</div>

<script src="<?= $ASSET_BASE ?>/search-by-item.js"></script>

<script src="<?= route("items_json") ?>"></script>
<script src="<?= route("sources_json") ?>"></script>

<?= render("footer") ?>
