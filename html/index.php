<?php
$conn = new mysqli("localhost", "root", "root", "lyHuang_resume");
if ($error = $conn->connect_error) {
    die('資料庫連接失敗:' . $error);
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
                <div class="text-1">Hello, my name is</div>
                <div class="text-2">Li-yan Huang</div>
                <div class="text-3">And I'm a <span class="typing"></span></div>
                <a href="#">Hire me</a>
            </div>
        </div>
    </section>

    <!-- about section start -->
    <section class="about" id="about">
        <div class="max-width">
            <h2 class="title">About me</h2>
            <div class="about-content">
                <div class="column left">
                    <img src="images/logo.png" alt="">
                </div>
                <div class="column right">
                    <div class="text">I'm Li-yan and I'm a <span class="typing-2"></span></div>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quasi ut voluptatum eveniet doloremque
                        autem excepturi eaque, sit laboriosam voluptatem nisi delectus. Facere explicabo hic minus
                        accusamus alias fuga nihil dolorum quae. Explicabo illo unde, odio consequatur ipsam possimus
                        veritatis, placeat, ab molestiae velit inventore exercitationem consequuntur blanditiis omnis
                        beatae. Dolor iste excepturi ratione soluta quas culpa voluptatum repudiandae harum non.</p>
                    <a href="#">Download CV</a>
                </div>
            </div>
        </div>
    </section>

    <!-- services section start -->
    <section class="services" id="services">
        <div class="max-width">
            <h2 class="title">My services</h2>
            <div class="serv-content">
                <div class="card">
                    <div class="box">
                        <i class="fas fa-code"></i>
                        <div class="text">Coding </div>
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Rem quia sunt, quasi quo illo enim.
                        </p>
                    </div>
                </div>
                <div class="card">
                    <div class="box">
                        <i class="fas fa-paint-brush"></i>
                        <div class="text">Web Design</div>
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Rem quia sunt, quasi quo illo enim.
                        </p>
                    </div>
                </div>
                <div class="card">
                    <div class="box">
                        <i class="fas fa-chart-line"></i>
                        <div class="text">Economic</div>
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
            <h2 class="title">My skills</h2>
            <div class="skills-content">
                <div class="column left">
                    <div class="text">My creative skills & experiences.</div>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dignissimos, ratione error est
                        recusandae consequatur, iusto illum deleniti quidem impedit, quos quaerat quis minima sequi.
                        Cupiditate recusandae laudantium esse, harum animi aspernatur quisquam et delectus ipsum quam
                        alias quaerat? Quasi hic quidem illum. Ad delectus natus aut hic explicabo minus quod.</p>
                    <a href="#">Read more</a>
                </div>
                <div class="column right">
                    <div class="bars">
                        <div class="info">
                            <span>HTML</span>
                            <span>90%</span>
                        </div>
                        <div class="line html"></div>
                    </div>
                    <div class="bars">
                        <div class="info">
                            <span>CSS</span>
                            <span>60%</span>
                        </div>
                        <div class="line css"></div>
                    </div>
                    <div class="bars">
                        <div class="info">
                            <span>JavaScript</span>
                            <span>80%</span>
                        </div>
                        <div class="line js"></div>
                    </div>
                    <div class="bars">
                        <div class="info">
                            <span>PHP</span>
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
        <h2 class="title">Portfolio</h2>
        <div class="carousel owl-carousel">
            <div class="card">
                <div class="side">
                    <img src="images/logo.png" alt="Project 1">
                </div>
                <div class="side back">Project 1</div>
            </div>
            <div class="card">
                <div class="side">
                    <img src="images/logo.png" alt="Project 2">
                </div>
                <div class="side back">Project 2</div>
            </div>
            <div class="card">
                <div class="side">
                    <img src="images/logo.png" alt="Project 3">
                </div>
                <div class="side back">Project 3</div>
            </div>
            <div class="card">
                <div class="side">
                    <img src="images/logo.png" alt="Project 4">
                </div>
                <div class="side back">Project 4</div>
            </div>
            <div class="card">
                <div class="side">
                    <img src="images/logo.png" alt="Project 5">
                </div>
                <div class="side back">Project 5</div>
            </div>
            <div class="card">
                <div class="side">
                    <img src="images/logo.png" alt="Project 6">
                </div>
                <div class="side back">Project 6</div>
            </div>
            <div class="card">
                <div class="side">
                    <img src="images/logo.png" alt="Project 7">
                </div>
                <div class="side back">Project 7</div>
            </div>
            <div class="card">
                <div class="side">
                    <img src="images/logo.png" alt="Project 8">
                </div>
                <div class="side back">Project 8</div>
            </div>
            <div class="card">
                <div class="side">
                    <img src="images/logo.png" alt="Project 9">
                </div>
                <div class="side back">Project 9</div>
            </div>
            <div class="card">
                <div class="side">
                    <img src="images/logo.png" alt="Project 10">
                </div>
                <div class="side back">Project 10</div>
            </div>
        </div>
        </div>
    </section>

    <!-- contact section start -->
    <section class="contact" id="contact">
        <div class="max-width">
            <h2 class="title">Contact me</h2>
            <div class="contact-content">
                <div class="column left">
                    <div class="text">Get in Touch</div>
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dignissimos harum corporis fuga
                        corrupti. Doloribus quis soluta nesciunt veritatis vitae nobis?</p>
                    <div class="icons">
                        <div class="row">
                            <i class="fas fa-user"></i>
                            <div class="info">
                                <div class="head">Name</div>
                                <div class="sub-title">Li-yan Huang</div>
                            </div>
                        </div>
                        <div class="row">
                            <i class="fas fa-map-marker-alt"></i>
                            <div class="info">
                                <div class="head">Address</div>
                                <div class="sub-title">Teipei, TW</div>
                            </div>
                        </div>
                        <div class="row">
                            <i class="fas fa-envelope"></i>
                            <div class="info">
                                <div class="head">Email</div>
                                <div class="sub-title">104208098@g.nccu.edu.tw</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="column right">
                    <div class="text">Message me</div>

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
                            <button name="submitted" type="submit">Send message</button>
                        </div>
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