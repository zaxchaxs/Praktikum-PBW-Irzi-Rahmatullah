// Nomor 1.
const deretFibonnaci = (n) => {
    const result = [];
    for (let i = 0; i < n; i++) {
        if (i == 0 || i == 1) {
            result.push(i);
        } else {
            result.push(result[i - 1] + result[i - 2]);
        }
    };

    return result;
};
console.log(deretFibonnaci(10));


// Nomor 2.
const calculator = (operator, ...numbers) => {
    let result = 0;
    switch (operator) {
        case "+": {
            numbers.forEach(num => {
                result += num;
            });
            return result;
        };
        case "-": {
            numbers.forEach(num => {
                result -= num;
            });
            return result;
        };
        case "/": {
            result = numbers[0] || 0;
            if (numbers.includes(0)) {
                return "Tidak bisa membagi dengan angka 0";
            };
            if (numbers.length === 1) {
                return result;
            };
            numbers.slice(1).forEach(num => {
                result /= num;
            });
            return result;
        }
        case "*": {
            result = numbers[0] || 0;
            if (numbers.length === 1) {
                return result;
            };
            numbers.slice(1).forEach(num => {
                result *= num;
            })
            return result;
        }
        case "%": {
            result = numbers[0] || 0
            if (numbers.length === 1) {
                return result;
            };
            return numbers.slice(1).forEach(num => {
                return result %= num;
            })
        }

        default: return "Unknown Operator"
    }
}

// 10 + 10;
console.log(calculator("+", 10, 10)) // 20

// 50 - 10 - 5;
console.log(calculator("-", 50, 10, 5)) // -65

// 20 / 2 ;
console.log(calculator("/", 20, 2, 2)) // 5

// 5 * 5 * 2;
console.log(calculator("*", 5, 5, 2)) // 50
