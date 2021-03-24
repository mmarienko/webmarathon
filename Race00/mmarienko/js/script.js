let resultStr = document.getElementById("result_str")
let inputStr = document.getElementById("input_str")

//===============================onclick functions===============================//

//-----------------------------Basic functions------------------------------
function addNewNumber(num) {
    if (resultStr.value == "0" && num != "." && num != ")") {
        resultStr.value = ""
    }
    if (num == "(" && isLastNumDigit()) {
        return
    }
    if (num == ")" && !isPutRightBracket()) {
        return
    }
    if (num == "." && !isHaveDots() && isLastNumDigit()) {
        resultStr.value += "."
    }
    else if (num == "e" && !isHaveDots() && !isLastNumDigit()) {
        resultStr.value += 2.71
    }
    else if (num == "pi" && !isHaveDots() && !isLastNumDigit()) {
        resultStr.value += 3.14
    }
    else if (num != "e" && num != "pi" && num != ".") {
        resultStr.value += num
    }

}

function arithmeticOperation(operation) {
    let resStr = resultStr.value

    if (isOperation(resStr[resStr.length - 1]) && resStr[resStr.length - 1] != "!") {
        resultStr.value = resStr.substring(0, resStr.length - 1) + operation
    }
    else {
        resultStr.value += operation
    }
}

function equals() {
    inputStr.innerHTML = resultStr.value
    resultStr.value = Number(eval(replaceHardOperations(resultStr.value)))

    if (document.getElementById("currentSys").children[0].innerHTML == "BIN") {
        resultStr.value = Number(resultStr.value).toString(2)
    }
    else if (document.getElementById("currentSys").children[0].innerHTML == "HEX") {
        resultStr.value = Number(resultStr.value).toString(16).toLocaleUpperCase()
    }
}

function toggleNumber() {
    if (resultStr.value == "") {
        return
    }
    equals()
    resultStr.value = -Number(resultStr.value)

}

function percent() {
    if (resultStr.value == "") {
        return
    }
    equals()
    resultStr.value = Number(resultStr.value) / 100
}

function reset() {
    resultStr.value = "0"
    inputStr.innerHTML = ""
}

function backspace() {
    if (resultStr.value == "Infinity") {
        resultStr.value = "0"
        return
    }
    resultStr.value = resultStr.value.substring(0, resultStr.value.length - 1)
    if (resultStr.value == "") {
        resultStr.value = "0"
    }
}

function squareRoot() {
    if (resultStr.value != "" && resultStr.value > 0) {
        resultStr.value = Math.pow(Number(resultStr.value), 0.5)
    }
}

//-----------------------------History------------------------------
function memoryRecall() {
    if (resultStr.value != null) {
        localStorage.setItem("result", resultStr.value)
    }
}

function memoryClear() {
    localStorage.clear()
}

function memoryStore() {
    if (localStorage.getItem("result") != null) {
        resultStr.value += localStorage.getItem("result")
    }
}

function memoryPlus() {
    let history = localStorage.getItem("result")

    if (history != null) {
        localStorage.setItem("result", Number(history) + Number(resultStr.value))

        resultStr.value = localStorage.getItem("result")
    }
}

function memoryMinus() {
    let history = localStorage.getItem("result")

    if (history != null) {
        localStorage.setItem("result", Number(history) - Number(resultStr.value))

        resultStr.value = localStorage.getItem("result")
    }
}

//-----------------------------Convertations------------------------------
function convertLenght() {
    let selectorTop = document.getElementById("length_select_top")
    let selectorBottom = document.getElementById("length_select_bottom")
    let output = document.getElementById("length_output")

    console.log(selectorTop.value)
    console.log(selectorBottom.value)
    console.log(output.innerHTML)

    equals()
    if (selectorTop.value == "centimeters") {
        if (selectorBottom.value == "centimeters") {
            output.innerHTML = resultStr.value
        }
        else if (selectorBottom.value == "meters") {
            output.innerHTML = resultStr.value / 100
        }
        else if (selectorBottom.value == "kilometers") {
            output.innerHTML = resultStr.value / 100_000
        }
    }
    else if (selectorTop.value == "meters") {
        if (selectorBottom.value == "centimeters") {
            output.innerHTML = resultStr.value * 100
        }
        else if (selectorBottom.value == "meters") {
            output.innerHTML = resultStr.value
        }
        else if (selectorBottom.value == "kilometers") {
            output.innerHTML = resultStr.value / 1_000
        }
    }
    else if (selectorTop.value == "kilometers") {
        if (selectorBottom.value == "centimeters") {
            output.innerHTML = resultStr.value * 100_000
        }
        else if (selectorBottom.value == "meters") {
            output.innerHTML = resultStr.value * 1_000
        }
        else if (selectorBottom.value == "kilometers") {
            output.innerHTML = resultStr.value
        }
    }
}

function convertWeight() {
    let selectorTop = document.getElementById("weight_select_top")
    let selectorBottom = document.getElementById("weight_select_bottom")
    let output = document.getElementById("weight_ouput")

    console.log(selectorTop.value)
    console.log(selectorBottom.value)

    equals()
    if (selectorTop.value == "grams") {
        if (selectorBottom.value == "grams") {
            output.innerHTML = resultStr.value
        }
        else if (selectorBottom.value == "kilograms") {
            output.innerHTML = resultStr.value / 1_000
        }
        else if (selectorBottom.value == "tonnes") {
            output.innerHTML = resultStr.value / 1_000_000
        }
    }
    else if (selectorTop.value == "kilograms") {
        if (selectorBottom.value == "grams") {
            output.innerHTML = resultStr.value * 1_000
        }
        else if (selectorBottom.value == "kilograms") {
            output.innerHTML = resultStr.value
        }
        else if (selectorBottom.value == "tonnes") {
            output.innerHTML = resultStr.value / 1_000
        }
    }
    else if (selectorTop.value == "tonnes") {
        if (selectorBottom.value == "grams") {
            output.innerHTML = resultStr.value * 1_000_000
        }
        else if (selectorBottom.value == "kilograms") {
            output.innerHTML = resultStr.value * 1_000
        }
        else if (selectorBottom.value == "tonnes") {
            output.innerHTML = resultStr.value
        }
    }
}

function convertArea() {
    let selectorTop = document.getElementById("area_select_top")
    let selectorBottom = document.getElementById("area_select_bottom")
    let output = document.getElementById("area_output")

    console.log(selectorTop.value)
    console.log(selectorBottom.value)
    console.log(output.innerHTML)

    equals()
    if (selectorTop.value == "centimeters^2") {
        if (selectorBottom.value == "centimeters^2") {
            output.innerHTML = resultStr.value
        }
        else if (selectorBottom.value == "meters^2") {
            output.innerHTML = resultStr.value / 10_000
        }
        else if (selectorBottom.value == "kilometers^2") {
            output.innerHTML = resultStr.value / 10_000_000_000
        }
    }
    else if (selectorTop.value == "meters^2") {
        if (selectorBottom.value == "centimeters^2") {
            output.innerHTML = resultStr.value * 10_000
        }
        else if (selectorBottom.value == "meters^2") {
            output.innerHTML = resultStr.value
        }
        else if (selectorBottom.value == "kilometers^2") {
            output.innerHTML = resultStr.value / 1_000_000
        }
    }
    else if (selectorTop.value == "kilometers^2") {
        if (selectorBottom.value == "centimeters^2") {
            output.innerHTML = resultStr.value * 10_000_000_000
        }
        else if (selectorBottom.value == "meters^2") {
            output.innerHTML = resultStr.value * 10_000
        }
        else if (selectorBottom.value == "kilometers^2") {
            output.innerHTML = resultStr.value
        }
    }
}

//===============================helping functions===============================//

function isOperation(operation) {
    return operation == "+" || operation == "-" || operation == "*"
        || operation == "/" || operation == "+" || operation == "^"
        || operation == "!"
}

function replaceHardOperations(input) {
    let str = ""

    for (let i = 0; i < input.length; i++) {
        str += input[i]
        if (isOperation(input[i + 1]) || isOperation(input[i])) {
            str += " "
        }
    }

    let arrStr = str.split(" ")
    let resArr = []

    if (document.getElementById("currentSys").children[0].innerHTML == "BIN") {
        for (let i = 0; i < arrStr.length; i++) {
            if (!isOperation(arrStr[i]) && arrStr[i] != "") {
                if (arrStr[i][0] == "(") {
                    arrStr[i] = "(" + parseInt(arrStr[i].substr(1, arrStr[i].length - 1), 2)
                }
                else if (arrStr[i][arrStr[i].length - 1] == ")") {
                    arrStr[i] = parseInt(arrStr[i].substr(0, arrStr[i].length - 1), 2) + ")"
                }
                else {
                    arrStr[i] = parseInt(arrStr[i], 2)
                }
            }
        }
    }
    else if (document.getElementById("currentSys").children[0].innerHTML == "HEX") {
        for (let i = 0; i < arrStr.length; i++) {
            if (!isOperation(arrStr[i]) && arrStr[i] != "") {
                if (arrStr[i][0] == "(") {
                    arrStr[i] = "(" + parseInt(arrStr[i].substr(1, arrStr[i].length - 1), 16)
                }
                else if (arrStr[i][arrStr[i].length - 1] == ")") {
                    arrStr[i] = parseInt(arrStr[i].substr(0, arrStr[i].length - 1), 16) + ")"
                }
                else {
                    arrStr[i] = parseInt(arrStr[i], 16)
                }
            }
        }
    }

    for (let i = 0; i < arrStr.length; i++) {
        if (arrStr[i + 1] == "^") {
            if (arrStr[i][0] == "(") {
                resArr.push("(" + Math.pow(arrStr[i].substr(1, arrStr[i].length - 1), arrStr[i + 2]))
            }
            else if (arrStr[i + 2][arrStr[i + 2].length - 1] == ")") {
                resArr.push(Math.pow(arrStr[i], arrStr[i + 2].substr(0, arrStr[i + 2].length - 1)) + ")")
            }
            else {
                resArr.push(Math.pow(arrStr[i], arrStr[i + 2]))
            }
            i += 2
        }
        else if (arrStr[i + 1] == "!") {
            if (arrStr[i][0] == "(") {
                resArr.push("(" + factorial(arrStr[i].substr(1, arrStr[i].length - 1)))
            }
            else {
                resArr.push(factorial(arrStr[i]))
            }
            i++
        }
        else {
            resArr.push(arrStr[i])
        }
    }

    console.log(arrStr)
    console.log(resArr)

    return resArr.join("")
}

function factorial(num) {
    if (num <= 1) {
        return 1
    }

    return num * factorial(num - 1)
}

function isHaveDots() {
    let isHaveDots = false
    for (let i = 0; i < resultStr.value.length; i++) {
        if (resultStr.value[i] == ".") {
            isHaveDots = true
        }
        if (isOperation(resultStr.value[i])) {
            isHaveDots = false
        }
    }
    return isHaveDots
}

function isLastNumDigit() {
    return (Number.isInteger(Number(resultStr.value[resultStr.value.length - 1]))) ? true : false
}

function isPutRightBracket() {
    let leftBracketsCount = 0
    let rightBracketsCount = 0
    for (let i = 0; i < resultStr.value.length; i++) {
        if (resultStr.value[i] == "(") {
            leftBracketsCount++
        }
        else if (resultStr.value[i] == ")") {
            rightBracketsCount++
        }
    }
    return (leftBracketsCount > rightBracketsCount) ? true : false
}
//===============================Event listeners===============================//

document.addEventListener('keydown', function (event) {
    if (document.getElementById("currentSys").children[0].innerHTML == "DEC") {
        switch (event.key) {
            case "0": addNewNumber(0); break
            case "1": addNewNumber(1); break
            case "2": addNewNumber(2); break
            case "3": addNewNumber(3); break
            case "4": addNewNumber(4); break
            case "5": addNewNumber(5); break
            case "6": addNewNumber(6); break
            case "7": addNewNumber(7); break
            case "8": addNewNumber(8); break
            case "9": addNewNumber(9); break

            case "Backspace": backspace(); break
            case "Enter": equals(); break

            case "+": arithmeticOperation('+'); break
            case "-": arithmeticOperation('-'); break
            case "*": arithmeticOperation('*'); break
            case "/": arithmeticOperation('/'); break
            case "^": case "ˆ": case "Dead": arithmeticOperation('^'); break
            case "!": arithmeticOperation('!'); break

            case "(": addNewNumber("("); break
            case ")": addNewNumber(')'); break

            case "%": percent(); break
            case "√": squareRoot(); break
            case ".": addNewNumber("."); break
        }
    }

    else if (document.getElementById("currentSys").children[0].innerHTML == "HEX") {
        switch (event.key) {
            case "0": addNewNumber(0); break
            case "1": addNewNumber(1); break
            case "2": addNewNumber(2); break
            case "3": addNewNumber(3); break
            case "4": addNewNumber(4); break
            case "5": addNewNumber(5); break
            case "6": addNewNumber(6); break
            case "7": addNewNumber(7); break
            case "8": addNewNumber(8); break
            case "9": addNewNumber(9); break

            case "Backspace": backspace(); break
            case "Enter": equals(); break

            case "+": arithmeticOperation('+'); break
            case "-": arithmeticOperation('-'); break
            case "*": arithmeticOperation('*'); break
            case "/": arithmeticOperation('/'); break
            case "^": case "ˆ": case "Dead": arithmeticOperation('^'); break
            case "!": arithmeticOperation('!'); break

            case "(": addNewNumber("("); break
            case ")": addNewNumber(')'); break

            case "a":
            case "A": addNewNumber("A"); break

            case "b":
            case "B": addNewNumber("B"); break

            case "c":
            case "C": addNewNumber("C"); break

            case "d":
            case "D": addNewNumber("D"); break

            case "e":
            case "E": addNewNumber("E"); break

            case "f":
            case "F": addNewNumber("F"); break
        }
    }

    else if (document.getElementById("currentSys").children[0].innerHTML == "BIN") {
        switch (event.key) {
            case "0": addNewNumber(0); break
            case "1": addNewNumber(1); break

            case "Backspace": backspace(); break
            case "Enter": equals(); break

            case "+": arithmeticOperation('+'); break
            case "-": arithmeticOperation('-'); break
            case "*": arithmeticOperation('*'); break
            case "/": arithmeticOperation('/'); break
            case "^": case "ˆ": case "Dead": arithmeticOperation('^'); break
            case "!": arithmeticOperation('!'); break

            case "(": addNewNumber("("); break
            case ")": addNewNumber(')'); break
        }
    }
});
