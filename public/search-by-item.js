let patternInput = document.querySelector("[name=pattern]")
let results1 = document.getElementById("results1")
let results2 = document.getElementById("results2")
let results = results1

let previousPattern = ""

function updateResults(pattern) {
    pattern = pattern.toLowerCase()

    if (pattern !== previousPattern) {
        if (pattern.length < 2) {
            return
        }

        pattern = pattern.trimLeft()

	location.hash = `#${pattern}`

        let matchingItems = Object.keys(dropItems)
            .filter(
                item => item.toLowerCase()
                    .includes(pattern))

        if (matchingItems.length === 0) {
            //alert("No matches. If you're looking for a relic then it's probably vaulted.")
            return
        }

        results.innerHTML = ""

        matchingItems.forEach(item => results.appendChild(makeMatchElement(item)))
    }

    previousPattern = pattern
}

function makeMatchElement(item) {
    let el = document.createElement("div")
    html = `<b>${item}</b>`

    html += `<ul>`

    dropItems[item].sort(sortByChance).forEach(source => {
        html += `<li>${source.chance}%     \t<a>${source.source[0]}</a>`
        if (source.source.length > 1) {
            html += `, ${source.source[1]}</li>`
        }
    })

    html += `</ul>`

    el.innerHTML = html

    return el
}

function sortByChance(c1, c2) {
    if (c1.chance < c2.chance) {
        return 1
    }
    if (c1.chance > c2.chance) {
        return -1
    }
    return 0
}

function showSourceInfo(event) {
    if (event.originalTarget.tagName !== "A") {
        return
    }
    if (event.currentTarget === results1) {
        results = results2
    } else {
        results = results1
    }
    let source = event.originalTarget.innerHTML
    updateResults(source)
}

function activatePatternInputOnEsc(event) {
    if (event.key == "Escape") {
        patternInput.focus()
        patternInput.select()
    }
}

function patternInputHandler(event) {
    let pattern = patternInput.value
    results = results1
    updateResults(pattern)
}

patternInput.addEventListener("input", patternInputHandler)

document.body.addEventListener("keydown", activatePatternInputOnEsc)

patternInput.focus()
patternInput.select()

if (location.hash.length >= 2) {
	let patternFromHash = decodeURIComponent(location.hash.substr(1))
	patternInput.value = patternFromHash
	updateResults(patternFromHash)
}
