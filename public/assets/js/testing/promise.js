var progres = 100;
const download = new Promise((resolve, reject) => {
    if (progres == 100) {
        resolve(progres);
    } else {
        reject("promise gagal");
    }
});

download
    .then((result) => {
        console.log(result);
        console.log();
    })
    .catch((error) => {
        console.log(error);
    });
