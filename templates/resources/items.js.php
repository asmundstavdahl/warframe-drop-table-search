window.dropItems = <?= file_get_contents("../parser/output/by-item.json") ?>

if (window.hasOwnProperty("updateResults")) {
    updateResults(patternInput.value)
}
