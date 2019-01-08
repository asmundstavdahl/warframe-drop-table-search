window.dropSources = <?= file_get_contents("../parser/output/by-source.json") ?>

if (window.hasOwnProperty("updateResults")) {
    updateResults(patternInput.value)
}
