async function createRoom() {
  data =
    "module=add_player&action=create&name=" +
    document.getElementById("player_name").value;
  const response = fetch("api/index.php", {
    method: "POST",
    headers: new Headers({
      "Content-Type": "application/x-www-form-urlencoded",
    }),
    body: data,
  })
    .then(async (res) => {
      data = await res.json();
      console.log(data);
      data.flag
        ? (window.location.href = "./whoiam.php?room=" + data.roomid)
        : "";
    })
    .catch((error) => {
      console.error(error);
    });
}

async function join() {
  roomid = document.getElementById("roomid").value;
  data =
    "module=add_player&action=join&name=" +
    document.getElementById("player_name").value +
    "&roomid=" +
    document.getElementById("roomid").value;
  const response = fetch("api/index.php", {
    method: "POST",
    headers: new Headers({
      "Content-Type": "application/x-www-form-urlencoded",
    }),
    body: data,
  })
    .then(async (res) => {
      data = await res.json();
      console.log(data);
      data.flag ? (window.location.href = "./whoiam.php?room=" + roomid) : "";
    })
    .catch((error) => {
      console.error(error);
    });
}

async function roomStatus(roomid) {
  data = "module=room_status&roomid=" + roomid;
  const response = fetch("api/index.php", {
    method: "POST",
    headers: new Headers({
      "Content-Type": "application/x-www-form-urlencoded",
    }),
    body: data,
  })
    .then(async (res) => {
      data = await res.json();
      console.log(data);
      data.flag ? (window.location.href = "./whoiam.php?room=" + roomid) : "";
    })
    .catch((error) => {
      console.error(error);
    });
    // setInterval(roomStatus(roomid), 2000);
}