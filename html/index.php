<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// 数据库连接信息
$servername = "127.0.0.1";
$username = "root";
$password = "root";
$dbname = "lyHuang_resume";

// 创建连接
$conn = new mysqli($servername, $username, $password, $dbname, null);

// 检查连接
if ($conn->connect_error) {
    die("資料庫連接失敗: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] === 'POST') {
    $accessed = true;
    // 進行端驗證

    foreach (["name", "email", "subject", "message"] as $key => $value) {
        if (empty($_POST[$value])) {
            $accessed = false;
            echo '<script> alert("' . $value . '不能為空!!") </script>';
            break;
        }
    }
    // 驗證通過
    if ($accessed) {

        $sql = "INSERT INTO message (name,email,subject,message) VALUES(?,?,?,?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('ssss', $name, $email, $subject, $message);
        $name = $_POST["name"];
        $email = $_POST["email"];
        $subject = $_POST["subject"];
        $message = $_POST["message"];
        $stmt->execute();
        $stmt->close();
    }
}
$sql = "SELECT * FROM message ORDER BY id DESC limit 3";
$result = $conn->query($sql);
$data = $result->fetch_all(MYSQLI_ASSOC);
$conn->close();

?>

<!DOCTYPE html>
<!-- Created By CodingNepal -->
<html lang="en">

<head>
    <?php include "../common/head.php" ?>
    <style>
        .testlist {
            background-color: #555;
            padding: 20px 20px 60px 20px;
        }

        .testlist .lists {
            background-color: #fff;
            padding: 15px;
            margin: 10px 0;
            display: flex;
            justify-content: flex-start;
        }

        .testlist .lists>div {
            margin-right: 10px;
        }
    </style>
</head>

<body>
    <div class="scroll-up-btn">
        <i class="fas fa-angle-up"></i>
    </div>
    <?php include "../common/header.php" ?>

    <!-- home section start -->
    <section class="home" id="home">
        <div class="max-width">
            <div class="home-content">
                <div class="text-1">我的名字是</div>
                <div class="text-2">黃 立言</div>
                <div class="text-3">我還是一個 <span class="typing"></span></div>
                <a href="#">Hire me</a>
            </div>
        </div>
    </section>

    <!-- about section start -->
    <section class="about" id="about">
        <div class="max-width">
            <h2 class="title">關於我</h2>
            <div class="about-content">
                <div class="column left">
                    <img src="images/S__12443688.jpg" alt="">
                </div>
                <div class="column right">
                    <div class="text">我是黃立言，我是一個 <span class="typing-2"></span></div>
                    <p>在過去的創業經歷中，接觸到了開發公司網頁的項目，深覺自己很有興趣，就開始自主學習，邊學邊做的過程中，不僅在解決問題時獲得到極大的成就感，並且能夠創造出有價值的產品，這促使我決心踏入程式領域。之後在創建獨立工作室的過程中，發現自己有很多的不足，也需要更有系統性的學習程式語言，於是開始了前端工程師的培訓。

                    </p>
                    <a href="https://pda.104.com.tw/profile/share/bGlrHD2sLajYOoKB2GtLiVO9dvBFdWv6">Download CV</a>
                </div>
            </div>
        </div>
    </section>

    <!-- services section start -->
    <section class="services" id="services">
        <div class="max-width">
            <h2 class="title">工作內容</h2>
            <div class="serv-content">
                <div class="card">
                    <div class="box">
                        <i class="fas fa-code"></i>
                        <div class="text">FRONTEND </div>
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Rem quia sunt, quasi quo illo enim.
                        </p>
                    </div>
                </div>
                <div class="card">
                    <div class="box">
                        <i class="fas fa-code"></i>
                        <div class="text">BACKEND</div>
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Rem quia sunt, quasi quo illo enim.
                        </p>
                    </div>
                </div>
                <div class="card">
                    <div class="box">
                        <i class="fas fa-paint-brush"></i>
                        <div class="text">UIUX</div>
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Rem quia sunt, quasi quo illo enim.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>

    <!-- skills section start -->
    <section class="skills" id="skills">
        <div class="max-width">
            <h2 class="title">我的技能</h2>
            <div class="skills-content">
                <div class="column left">
                    <div class="text">軟體工程師</div>
                    <p>目前已經擁有一些使用 Next.JS、Express.JS、和 Laravel 的經驗，並在前端技術如WebRTC 和 WebSocket 方面有一些基本的實踐。我始終保持著對新技術探索的熱情，並不斷學習和進步。也相信，憑藉這份熱情和不斷積累的技能，一定能夠在程式設計領域創造出更多的價值，實現自己的理想。</p>
                    <a href="https://github.com/laryTec">Read more</a>
                </div>
                <div class="column right">
                    <div class="bars">
                        <div class="info">
                            <span>NextJS</span>
                            <span>80%</span>
                        </div>
                        <div class="line js"></div>
                    </div>
                    <div class="bars">
                        <div class="info">
                            <span>ExpressJS</span>
                            <span>80%</span>
                        </div>
                        <div class="line js"></div>
                    </div>
                    <div class="bars">
                        <div class="info">
                            <span>PHP</span>
                            <span>80%</span>
                        </div>
                        <div class="line js"></div>
                    </div>
                    <div class="bars">
                        <div class="info">
                            <span>Docker</span>
                            <span>50%</span>
                        </div>
                        <div class="line php"></div>
                    </div>
                    <div class="bars">
                        <div class="info">
                            <span>MySQL</span>
                            <span>70%</span>
                        </div>
                        <div class="line mysql"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- teams section start -->
    <section class="teams" id="teams">
        <h2 class="title">作品集</h2>
        <div class="carousel owl-carousel">
            <div class="card card1">
                <div class="side" style="background-image: url('./images/image.png'); background-position: center -20px; background-size: cover;">
                    <img src=" images/logo.png" alt="Project 1">
                </div>
                <div class="side back">RPG 遊戲官方網頁</div>
            </div>
            <div class="card">
                <div class="side" style="background-image: url('./images/image3.png'); background-position: center -20px; background-size: cover;">
                    <img src="images/logo.png" alt="Project 2">
                </div>
                <div class="side back">RPG 遊戲私服搭建</div>
            </div>
            <div class="card">
                <div class="side" style="background-image: url('./images/image2.png'); background-position: center -20px; background-size: cover;">
                    <img src="images/logo.png" alt="Project 3">
                </div>
                <div class="side back">PHP 綠界金流網頁</div>
            </div>
            <div class="card" style="background-image: url('./images/image1.png'); background-position: center -20px; background-size: cover;">
                <div class="side">
                    <img src="images/logo.png" alt="Project 4">
                </div>
                <div class="side back">PHP 個人履歷網頁</div>
            </div>

        </div>
        </div>
    </section>

    <!-- contact section start -->
    <section class="contact" id="contact">
        <div class="max-width">
            <h2 class="title">聯絡我</h2>
            <div class="contact-content">
                <div class="column left">
                    <div class="text">我的資訊</div>

                    <div class="icons">
                        <div class="row">
                            <i class="fas fa-user"></i>
                            <div class="info">
                                <div class="head">姓名</div>
                                <div class="sub-title">黃 立言 </div>
                            </div>
                        </div>
                        <div class="row">
                            <i class="fas fa-map-marker-alt"></i>
                            <div class="info">
                                <div class="head">所在地</div>
                                <div class="sub-title">台灣 台北</div>
                            </div>
                        </div>
                        <div class="row">
                            <i class="fas fa-envelope"></i>
                            <div class="info">
                                <div class="head">信箱</div>
                                <div class="sub-title">104208098@g.nccu.edu.tw</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="column right">
                    <div class="text">寄信給我</div>
                    <p> ※注意: 此處是用於 PHP 測試 server mysql 的區塊，表單送出會讀取 database 中 最新的三筆資料。
                    </p>
                    <br>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="fields">
                            <div class="field name">
                                <input name="name" type="text" placeholder="Name" required>
                            </div>
                            <div class="field email">
                                <input name="email" type="email" placeholder="Email" required>
                            </div>
                        </div>
                        <div class="field">
                            <input name="subject" type="text" placeholder="Subject" required>
                        </div>
                        <div class="field textarea">
                            <textarea name="message" cols="30" rows="10" placeholder="Message.." required></textarea>
                        </div>
                        <div class="button-area">
                            <button name="submitted" type="submit">傳送</button>
                        </div><br>
                    </form>
                    <div class="testlist">
                        <?php
                        foreach ($data as $key => $value) {
                            echo '
                            <div class="lists">
                                <div>姓名: ' . $value["name"] . '</div>
                                <div>信箱: ' . $value["email"] . '</div>
                                <div>主旨: ' . $value["subject"] . '</div>
                                <div>內容: ' . $value["message"] . '</div>
                            </div>
                            ';
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- footer section start -->
    <?php include "../common/footer.php" ?>

    <script src="script.js"></script>
</body>

</html>