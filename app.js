const funct = () => {
    let finalizeData = document.getElementById("finalizeData");
    const parinfo = document.getElementById("parinfo");
    const parwgh = document.getElementById("parwgh");
    const parqty = document.getElementById("parqty");
    if (parinfo.value != "NULL" && parwgh.value != "NULL" && parqty.value != 0) {
        finalizeData.style.display = "block"
    }
}
