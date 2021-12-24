const alphabet = [
    'a',
    'b',
    'c',
    'd',
    'e',
    'f',
    'g',
    'h',
    'i',
    'j',
    'k',
    'l',
    'm',
    'n',
    'o',
    'p',
    'q',
    'r',
    's',
    't',
    'u',
    'v',
    'w',
    'x',
    'y',
    'z'
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

let res = encrpt('awasi asterix dan temanya obelix');
let final = res.split(' ').join('#');
console.log(final);