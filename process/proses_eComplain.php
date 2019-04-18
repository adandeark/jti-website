<?php
include "../config/connection.php";

if (isset($_GET["tampilRecentChat"])) {
  $idUser = $_GET['idUser'];

  $resultRecentChat = mysqli_query($con, queryTampilRecentChat($idUser));
  $firstRowRecentChat = mysqli_fetch_assoc(mysqli_query($con, queryTampilRecentChat($idUser)));

  if (mysqli_num_rows($resultRecentChat) > 0) {
    while ($rowRecentChat = mysqli_fetch_assoc($resultRecentChat)) {
      ?>
      <div class="row recent-chat-item border-bottom border-gray p-3 <?php echo ($firstRowRecentChat["id_chat"] == $rowRecentChat["id_chat"]) ? 'active' : ''; ?>">
        <div class="col-md-auto p-0">
          <img class="chat-profile-photo" src="../attachment/img/avatar.png">
        </div>
        <div class="col">
          <div class="row chat-info">
            <div class="col recentName">
              <?php
              echo tampilMahasiswa($con, $rowRecentChat["recent_user"]);
              ?>
            </div>
            <div class="col-md-auto pr-0">
              <?php echo date("d M Y", strtotime($rowRecentChat["waktu"])) ?>
            </div>
          </div>
          <div class="row">
            <div class="col pr-0 recentIsi">
              <?php echo $rowRecentChat["isi"] ?>
            </div>
          </div>
        </div>
      </div>
    <?php
  }
} else {
  echo "gagal";
}
}

if (isset($_GET["tampilChat"])) {
  $idUser = $_GET['idUser'];

  $firstRowRecentUser = mysqli_fetch_assoc(mysqli_query($con, queryTampilRecentChat($idUser)));
  $idUserTujuan = $firstRowRecentUser["recent_user"];
  $resultChat = mysqli_query($con, queryTampilChat($idUser, $idUserTujuan));

  if (mysqli_num_rows($resultChat) > 0) {
    $prev = '';
    while ($rowChat = mysqli_fetch_assoc($resultChat)) {
      if ($rowChat["penerima"] == $idUser) {
        ?>
        <div class="row chat-kiri px-3 py-1 <?php echo (($prev != 'kiri') ? 'pt-3' : ''); ?>">
          <div class="photo-container p-0">
            <?php
            if ($prev != 'kiri') {
              ?>
              <img class="chat-window-profile-photo" src="../attachment/img/avatar.png">
            <?php
          }
          ?>
          </div>
          <div class="col">
            <div class="row">
              <div class="col-md-auto chat-window-item py-1 px-2">
                <div class="row">
                  <div class="col">
                    <?php echo $rowChat["isi"]; ?>
                  </div>
                </div>
                <div class="row chat-window-item-info">
                  <div class="col text-right">
                    <?php echo date("d M Y", strtotime($rowChat["waktu"])); ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <?php
        $prev = 'kiri';
      } elseif ($rowChat["pengirim"] == $idUser) {
        ?>
        <div class="row chat-kanan px-3 py-1 <?php echo (($prev != 'kanan')  ? 'pt-3' : ''); ?>">
          <div class="col">
            <div class="row">
              <div class="col-md-auto chat-window-item py-1 px-2 ml-auto">
                <div class="row">
                  <div class="col">
                    <?php echo $rowChat["isi"]; ?>
                  </div>
                </div>
                <div class="row chat-window-item-info">
                  <div class="col text-right">
                    <?php echo date("d M Y", strtotime($rowChat["waktu"])); ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="photo-container p-0 text-right">
            <?php
            if ($prev != 'kanan') {
              ?>
              <img class="chat-window-profile-photo" src="../attachment/img/avatar.jpeg">
            <?php
          }
          ?>
          </div>
        </div>
        <?php
        $prev = 'kanan';
      }
    }
  } else {
    echo "gagal";
  }
}



function queryTampilChat($idUser, $idUserTujuan)
{
  $chat =
    "SELECT
      *
    FROM
      tabel_chat
    WHERE
      pengirim = $idUser 
    AND 
      penerima = $idUserTujuan
    OR 
      pengirim = $idUserTujuan
    AND 
      penerima = $idUser
    ORDER BY
      waktu
    ";

  return $chat;
}

function tampilMahasiswa($con, $idUser)
{
  $hasil =
    "SELECT
      nama
    FROM
      tabel_mahasiswa
    WHERE
      id_user = $idUser
    ";

  $resultHasil = mysqli_query($con, $hasil);

  $rowNama = mysqli_fetch_assoc($resultHasil);
  return $rowNama["nama"];
}

function queryTampilRecentChat($idUser)
{
  $recentChat =
    "SELECT
      id_chat,
      isi,
      b.recent_user,
      waktu
    FROM (
      SELECT
        id_chat,
        isi,
        pengirim,
        penerima,
        IF (
          pengirim = $idUser,
          penerima,
          pengirim
        ) 
        AS 
        recent_user,
        waktu
      FROM
        tabel_chat
      WHERE
        waktu IN (
        SELECT
          MAX(waktu)
        FROM
          tabel_chat
        GROUP BY
          IF (
          pengirim = $idUser,
          penerima,
          pengirim
        )
      ) 
    ) AS b
    ORDER BY
      waktu
    DESC
    ";

  return $recentChat;
}
