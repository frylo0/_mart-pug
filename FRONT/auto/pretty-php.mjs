import fs from 'fs';

const argv = process.argv.slice(2);
const phpFilePath = argv[0];
const phpFile = fs.readFileSync(phpFilePath).toString();

const newPhpFile = phpFile.replace(/(?<!\n|\t|    )(?<=  |> |>)<(?!\?=)/g, '\n<').replace(/>([^\n"' ])/g, '>\n$1');
fs.writeFileSync(phpFilePath, newPhpFile);