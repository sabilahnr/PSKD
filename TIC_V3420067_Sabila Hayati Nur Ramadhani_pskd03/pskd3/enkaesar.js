const alphabet = [
    'A',
    'B',
    'C',
    'D',
    'E',
    'F',
    'G',
    'H',
    'I',
    'J',
    'K',
    'L',
    'M',
    'N',
    'O',
    'P',
    'Q',
    'R',
    'S',
    'T',
    'U',
    'V',
    'W',
    'X',
    'Y',
    'Z'
];

function encrpt(str) {
    let accumulator = '';

    for (let i = 0; i < str.length; i++) {
        const char = str[i];
        const isALetter = alphabet.includes(char);
        if (isALetter === false) {
            accumulator += char;
        } else {
            const charIndex = alphabet.findIndex((c) => c === char);

            accumulator += alphabet[charIndex + 3] || alphabet[charIndex - 23];
        }
    }
    return accumulator;
}

let res = encrpt('AWASI ASTERIX DAN TEMANNYA OBELIX');
let final = res.split(' ').join('#');
console.log(final);