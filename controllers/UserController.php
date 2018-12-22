<?php

namespace app\controllers;

use app\models\Follows;
use function PHPSTORM_META\type;
use PHPUnit\Framework\Constraint\Count;
use Yii;
use yii\base\Model;
use yii\db\Exception;
use yii\db\Query;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Images;
use app\models\Users;
use app\models\UsersInfo;
use app\models\UploadForm;
use conquer\select2\Select2Widget;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use yii\web\UploadedFile;



class UserController extends CentController
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex()
    {
        $params = Yii::$app->request->getQueryParams();

        return $this->render('index', ['model' => 'phones']);
    }


    public function actionUploadimage()
    {

        if(isset($_POST["image"]))
        {
            $data = $_POST["image"];

            ////data:image/png;base64,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

            $image_array_1 = explode(";", $data);

            //base64,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

            $image_array_2 = explode(",", $image_array_1[1]);

            //iVBORw0KGgoAAAANSUhEUgAAAZAAAAC0CAIAAAA1l+0PAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAAEnQAABJ0Ad5mH3gAABk3SURBVHhe7Z1/iF5VesfnjyJM/3hLWJyhL13WQWGlKETYLVKEsF0WFTrSTZBaRIpdVrZZ2SZl0W4bdV3sgtsqMSC1RurWZNsSXImQqFXYCOLG/CErWUhapdHJTDNm4saEDJhJ0qTfc+/JzZ1zfz3Puee+73tevx++SJz3nvOee997vu9znvvc+05cIoSQSKBhEUKigYZFCIkGGhYhJBpoWISQaKBhEUKigYZFCIkGGhYhJBpoWISQaKBhEUKigYZFCIkGGhYhJBpoWISQaKBhEUKigYZFCIkGGhYhJBpoWISQaKBhETI+nF+Yv7h8xv7POELDImR8WFw/e/KJx+3/jCM0LELGhM8O7P9oYmJuzQTiLPunsYOGRciYsHDzTUdnpuemJo9vvM/+aeygYREyDpze+QLCq6PX9iH8A9GWfWG8oGEREj0XlpaMVc1Mp4aFfyDasq+NFzQsQqLnk8cenVtjw6tUCLIQc9mXxwgaFiFxs3L4ULYYvKKZafxx/EocaFiExM3Hd995tN9zDevaPmKuEw9+3240LtCwCImY5Tf3lYRXlwXPOnvwPbvpWEDDIiRijDFlufai+r3F9bN20yaWF04tvn2kpS6urNjuuoGGRUisnNr+TE14lQobnNn9km1Qzb5v/+z5iQdaatfarba7zqBhERIlF5aW5qYm68KrVMkG9dn3V29/GnazY+KhNkIPpz44YXvsDBoWIVFy4pEtTilDlbDZJ489apsVeH/Xu0Hc6sDDe22PXULDIiQ+Vg4fMm7VGF5dFhaGpTcYXlxZcazHW8sLp2ynXULDIiQ+qkoZKtXvoYltnANhUZDw6tDz79geO4aGRUhkLL+ypzHXXhSaLL+5z3aRgJiovVtBL9+yreuLgxk0LEJiAtYwv/Z6+WLwipIbDPPO8tqG7UHCq8W3j9geu4eGRUhMSEoZqoSGaJ72A5cJ4lZwvbTDwUDDIiQaLi6fMW7lEV6lQsN+78LSErpyrMdPMKzB5NozaFiERINf9iqv9AbDQ8+/EyS8GkwpQx4aFiHRcHrnC8LaqyrNTU3+719896cTP3Tcx08Dy7Vn0LAIiYazB99rFWHNTM+vvf6tu//J8R0PIbx6f9e7dlgDhIZFSEyoK7ByQnR25L6HgoRXL9+yzQ5osNCwCImJ8wvznkFWUtbw6u1PO9bjIYRXgyxlyEPDIiQyfrNtq4dnzU1NHv7uk+3DK7jVvm//zA5l4NCwCImMiysr6S96OZZUp+TBWLvWbnXcx0MwrAGXMuShYRESH/UPGi1qbs1EqFz74EsZ8tCwCImS4xvvM8/DKnhTUWFLGezbDwkaFiFRYh7gJ3nCTFLKECrXPpRShjw0LEJiJf2154+u7tcI4VWoUoa9f/Kv9o2HBw2LkGGw/yeXXt/cXmd/PN2o3Tf8yLEeR//8O3+N6Mn5oyNY3qfb73fe3dWRN+zedQYNi5BhcPy9S89MXHqutf5lqk47rvrvv/rzmvAKL/3N7215rv/1/V/8Zv1mv/rOJvTmvrsj7NHr37E72A00LEKGBOY2JrljMUF1/tkv19jQ36/5u80zD/7gS5tenLrh6LX9+iALXTmdlwue9atn7Q52AA2LkCFx7tNuDWvHVb/csLnUsFKrSrXzd9cZw5qZPnjN10o3xh8Rppnwyum/Stgp7Fo30LAIGR4IRhCSOBM+kJa3frVoQPgL1oCZWz1147devvq6NMI62u/t+cLGYpPdN/xI4VYQDKuzhSENi5ChYR7P8h9/4E74INpx1d6v/K1jPfnAKhWsKlVaAPHBdTc6TeBfS//4pzrDguDCxzv5iXwaFiFD5cgb4YOsHVedfOCufKxUtCooC6+sYSVB1i+m78k3fOO2h9RuBSHIghF3AA2LkGGze13YZNb5Z7+cZdDhPo5PZcrCqyuGlZShZm6FtlhXOp1L1U32nYZFyLBJSxycCe+tHVf9cvbONErKp6scPdf/eolhJUHWr2/YgOaQLWVw+perg+w7DYuQEeD1zaGCrDTXXroGzPSDL23KFoOuYSWe9fPJTfC7tvk1uPD+n9gdDAQNi5ARIFyJA8Krp278Vr3SUoZKw0pKHP7nHx5uFV6lwk4Fzb7TsAgZDUKVOKCTv5y49Md1+q+v9OsMK3nAw2f/+e8BrmDCsIKWONCwCBkZApY4wLbu/C3Hp/KqWxJCM9OL62fNgq593IeRhLvHkIZFyMgQusTh7I+nq2zr0z/q1RlW9jPRQTw0XIkDDYuQEeL/XrorVDLrir73245bpTrw+9fUGBaCrPm11wcLsgKVONCwCBklwpY4ZEKfhcRWPshy3SrR3NTkiUe2mDIxpzcPYQAhShxoWISMGK9v7sSzIHS7eoWYZd8dq8qEheHZvU8GCLJM9n2z3cEW0LAIGTEQiXRkWImcxNaVm59LlWTfwyxUsVOtSxxoWISMHl0+xcHqcmIrXRi6PpVXv2eeNRqiJssYXztoWISMJLvXde5Z6D+xLQRZrknllfxkdLAgq12JAw2LkFElvUKHSV4lvIrAp6WemTj9Z72Pri74VF793skH7ko3bivYVovsOw2LkFi5uLLyb1dva9Svb9gw/9U/rBfCKNekVmtuavLswfeM17RXC2hYhMTKW5tebPy1G+jnk5uMH9Wr4FCu+r2P777TvvHwoGEREiWnPjghcSvopxM/RJAFx3E9SKmPJiaW39xn335I0LAIiRLtjzk77uMjBGL9nn37IUHDIiQ+3t/1rjC8SoUg6xfT97QPsubWTJx84nE7iGFAwyIkMi6urDh+JBE864PrbhSlq2o0M42F4fmFeTuUgUPDIiQyDjy8VxVepYJh7fnCxgBB1tTk4r332KEMHBoWITGxvHDKw61SwbMOXvO1tkHWULPvNCxCYuK1Ddu9DQuyJQ4FD9Kp3zv2jXXmRxUHDg2LkGhYfPtIG7eCEGTt/+I3g5Q4fHZgvx3WAKFhERINu9ZudQzIT/Nrr28ZZ8Gwzux+yQ5rgNCwCImDQ8+/0zK8gtAD+ll+cx8cx/EgldDc3KkzcGhYhETA8sIpx3r8hBgtzT0dm73Vf2HY76F5OrABQ8MiJAKEtw3WCz28v+vdtMNzHx7xDrKGlcACNCxCRh35bYM1Qg+vbdhue0w48ciWuTVqz5qbmlzadL/tYuDQsAgZdV6+ZZvjPh6CYcH4bI8JF5aWjAepsu8z0/A4VroTQsrR3jZYKvRw4OG9tsccp3e+oFoY8l5CQkglfrcNlqq0zhN/PPaNddLsexJe2ZZDgoZFyOjid9ugI/SQ5dqLfHZgvzDIwmbLr+yxzYYEDYuQESXNtbcxrLT5W5tetD1WsHiv4Mkz/d7i+lnbYHjQsAgZURBevXr7069t2O4tWFVNbJVxfmG+McjCBkOpFHWgYRFCLn3y2KM1JQ546cSD37ebDhUaFiHEZN9NfUNpiUPy9wtLS3bToULDIoQYzux+qXRhiPDq1PZn7EbDhoZFCLEs3nGbm32fmZ5fe719eQSgYRFCLMUSB1PKMOyf9spDwyKEXOH4xvvmpiatYY3Gj6fmoWERQq5wYWnJXC5Msu8Ir859eMS+MBrQsAghqzj51JPwLOiTxx61fxoZAhjWb7ZtRdy4eO89jcJmp3e+YJu1AJ3I39HjAoe8/1R+V3xPPvG4009RfuNP+ezAfsleYJvSu8zCcn5hXnVI82o5vJXDhzze2qPsCNPb6aRRbT7f7jAlDknq/eLyGfunkSGAYeGjNYk67GGTsBnM2zZrAaa6/B1PPLLFNhODQQr7N6v9fs/DsM4efE++C34Vxojq0+HVC/3jK8e26YyFm28yC43CuzfKfIKtSxZhDcKjnQnbq5LN9nl4hX5qhE8Hx2SIj2qp4czul0bQSUEYw7qSpasVPp5QhmXO/kL/RWFgHoaFCSzsP13qexgWJnDatln9HjbWRhnmQxHvAmZap2WBisGUCcNr+XsH+byMVMkvWdn2AlblqmXCfgVZcHyuoGGV0LVhVVXoVQkbq46b/P77VDhKmG+2cWiWX9mjGkyJklCxZfYX8YJ2GNhe+HAChMBqR1YaIkmhYZXQqWGZBMHlhnJh8ggXhuhf8YSjy8L+dnFrK46M6V+5syUK8agA9W9bzUwjtrWNa/ELr4b1WPSooWGV0Klh4QhIO89L/IWM/n0imm4qbsxM9tjZMmGnWmZVtIEnhO0bgyybjiy0rRFOyyE+Fj1qaFgldGdYJuJAE6+IA7OiMZXT8qdQwtY0t//xO0foTfXdUEQdCiWflG1cwaLkYVJ5JUnDEbwAFwU0rBK6Myz5yEuUnui12XdESdrF4BWF/rE5c1Z4WXOV0GHLXJv5wsDx0YwKx7zme8IjvKrvkNRDwyqhI8NqE16lwqhqavk8ljyO0DxUYsUjyS0R+myZa1MPLMlkVX1PLK6f1X1DDO8nSMcDGlYJHRkWpoq02yrV/siSolSiSoGmE9Y7ZiQtB1Oq1rk2WI/2QMHgSusP/MKrLi5ufH6gYZXQhWGZi4Mh5jAGhgNuO80RoHogETpZOXzIduqL4gDqhRG2DAPVoWhFkKUNr6o+OyKHhlVCF4alrb2qVBJkFYuSAoRXqfq9xXvvsZ16YcIr9KMajGrjECUO2uw7PjsnyPJwPfyXufaW0LBK6MKw1EVA1cLYnJ0KeT2udtUpQZ0kSoMUzcFB/y2DLHxkZpDyN02eY5e3G214hbdjrr09NKwSghuWR7KjTknld/5NW10cLKjNx6TOECX1ZfBHM35Nq5ZhINAaKzbOgiz1N4S4jI7UQ8MqIbhhLW26X3iIhMpPnpXDh0K6IVSIJuRoU2nYOE2ZeTRsebMOvFV3S0ASe6aZrJJHCdcq203SEhpWCWENq5NLZrm7RuRHQy5MML8i0mOzt8pnMoadr9JQVWA6bf3Q5qHwpojLtPEyWnmchKQUGlYJYQ1LnW5Hn4J5iz7TEEO4BFOFeNjY494RXayXmHj+0GmNABsXr9xpMcGv3O5nphGUwSgVBzP5aJhrDwUNq4SwhqVLMM1ML66flTTBCLEqPC/4zV7IHHlVIJa4iXaa4VDLZzIGUwyRVMcKO94+jY3PzoxZ4PhW2FL+aQYaJMmgYZUQ0LDwkjm/xfMB5zfWKaJbAvs9RAeS1A/2BZ8RBmNSNpqRNN7362BGIuy/ojhDl8wOVOaqvqwp1+j9iEPs0LBKCGhYuvVgLjNl1h31Y0hS4/Cshi/83K22qsGYQ6epctR6TdVMVtV/4BAFeWKn6U38pnLhgDDXHhYaVgkBDUuVSMb5nS0fMA/NGOpnEV5t6twc8yceT/uEbSnsQHCvdR7tnlYl9VU3MGFLbG9btiBw3UkijK39ZQHiQMMqIZRhmeuD8vUgNludNvJ4LFxRmIf5GKQ5cMsJbYX1mWbliybiPcUYbMsCwqycVbh7iXXZ90bhUPR77a8JEAcaVgmhDEt11Rzv6AxVe9G9RIUCS6xQ5NNS/nmpqqjwodRfglSVnmKQLQuyUmCUim+XJuFoaDOARAINq4RQhiUfJ4RT3Aln8P2sSugUVTptFKn3JE1mm9ViwhNxMGhGVVvkpV0Vlj5KwQP0I7fdOoW425GUQsMqIZRhKaoo0+cBFMoIMHi5EbjC2Mp+gkxlB5jAxVE56FJjaZ+1ayVdPVeI23RSMCpd7XuFMHjm2juChlVCEMPC2S+fdVXjbLUqrLgSp1oV4t0bS951GWuZv5gtxWFgqS/7gQMuPzilMif55ascJDg0rBKCGJbKa6p8QeV6jrALVVfQzAYyO0AnjZe6FIcr6VCygpOfVBAOkbOaboP2MQyrVBEpk1DQsEoIYliKlVd1J0B1d15eeHfEPraX1ShSToLHDGjL0yXLJV3JWLig5tyHR8y+yNy8REnDIKVhpBQaVglBDEtRl1R7bV4Vv1wRBjYzXZUqUlzUS3awJmTAS2Z4whmejkoQgGiLG0IluVXmWyqccqFyaqQIDauEIIZljolsGpvDUh0g6CrIM2EO33Gb7aKAyg4wvJqYqIsEFoCpqYobMIb2C7FQVwnRSWPij/hBwyqhvWHhL/JTv/78xjz0mEWNh9rsoMwOzPCqS4q0JQjyE+D4xvvkwQ4G2TKNFbIOK+mk/koo8YOGVUJ7w1Jl3PFe9aWPHtVY9SYI5CtW86lVB4BaW5GHHjhVpJ9CMsiqKwxCcECEp7FEGA/vy+mCKA1LbijGsPS/U9LesBQ54+R5x7ZZBYp02GXh3etz24rIqHYdp4pKMCp5Qlq3FhYvNktRVeoLhQ6DlOCTPFEalmqyefxWcHvDQlgn/boW3A0njygzYbbYxhWo8u5VFwpVK1/0o7rkj9mu2Ova+xPrsYtuZQzbrHCXAkhGlIaliF9qc89VtDcseS2PiQGbFq2nd76gMyyMqt+zjSuAHcgNC/8t7iPQBkGqh0PBR7QF9KWDbCTITealwpCyx2+QIERpWIoMEU736qv7VbQ3LPkVLrxR4zmtyogZCb7bVbl8DLJ0daNyUpwk9fc8F1HVoGF3PPLu6sVgcka5f6xSi5/zIKVEaViK6CA5j7WFfC0NC/+bvdQoDK8xD60rSkqsoTFqg4nLXRXvXuoFqtgEh1SbF1dl9NG/NpzxCOLwFvJdhjAqZt8DEqVhqRzB4zxuaViq5AvmQGPlN/o3HYrnFTaWWIO8SBIdlt5Poy2Vkl8iTFE9vcvYtPICi0k1ivtP9xSttEtIyUdMhERpWEBxw1d1zriKloalqqXElo1LBm0ggMFLPFr3wZVVNpijpDGsqluFqsBeyI8kzgfVB61daGPj1HB1tbKQcmCkhlgNq6MnZ6a0NCxVWgRb2mbVYPmGM15lDTWlnhm6crZC8KK9iod5q12b6zxF/PQugEOq+g7A4PNpQY8gS3LLN2lk0IYFL7DN2qG7PpWcyo6t1NDSsBRVF0lz26wWRUQpNuiWpVgebqJNP2MlpfVE4aesWwwWDqkdmNzv0l+NZva9NQM1LJxPS5vuxwcPu/GQfb8EfEOaDjXfkAs331R6qatIS8NSFGHlfianHlXtKGaXZPGlWHAly2rnYqvu+pp4T/MgIjNHUvwp41OTZIu0azqMoejX5rTXWB421l4kJUUGa1hQv4dzxU/OhNF+SeKtsT1GWz+Z4T6KPSozLMW1LXFtofYZxBJrxncAtnTalqssPlLYOqTPJAK8oznCYsPC7jSGljiLzLUCsftD2M2iD+JDV5kpJBkeqWfghuWromHhjJHOt0zJfTBoBR2bvRXOAiOA8A8YB+Zk+pJid8oMS/GIEnEhfheGpVjTla1oVEMy1ux164wq04TdabzacPKJx6V7nQj7iDPcNl7NSc3djkZJ9t05jYmKiA0LqIOsvDANEHNNTZrBw18gzbelVcGwMEhT7ijrqmYyOGgNS5LeRtQgn7rY0t+Xkz3FLtiWGlSVEzgZau7TBurcU9mOZ+Cz9uhNW4xG8sRtWNolQ3glb73KsDQPcjKGJXuYhOog41hJDEtVj4otnWWR6sIlJrZf/aSq2N0cz9ovAFVvUOOw1Y/QSmLVKgckjcRtWEBXqhNcBcPCv7O/N0o+jUfBsPL5F3wW2tjHL7JQXW3AljULTwxAd6rkfuW/hnTLVQ1rhc/Rb3VMQPSGBRCk6E7EgCozLHM0xIYlLEwbBcPK13apfBlCc0ktaxF1pqziIoZqZ1Nhe0nxlPpuxPRgKov+Sco4GBb+/vHdd2LyO00GoYJhqSYGxiwsTOvIsOQHDVvmZy/amsBHY1iSWtYiihoRqKz8ImXxjttUi0F0hRCy6pRzUFXJGaVXXWWdkzzjYFgp+CqWO0UwFQzrnObG7OEalgkGNYaVX9PZ7HVhsyoZw/KKKVS3NFiXKSzi1JmmZMDykFBxvfWysFOh7vr4XDE+hgVskkL1XddSSW1X3rBURYloG5Fh5YequsIIYWM/w9JWeyFyyX8cQBsMGunv/lNdMzVKsu/CSmaSMVaGBTCRcKqZuaQ6QbW6XM+F6YFv7/zAFNWYsRlWvmJAWyyOjf0MC19CKsOCnH1f1D+s3WO0WgeHMCpm37WMm2GlLL+yB0sDcwJpv1prlEwGTJ70vMQKtLRqWZWCjcmwVldgaBdB2Lj0cDWiNSyMM7/vPheRlU9GzdDeEQ1hbH6pvc8tAQwrTR4NQHLDSsGpkJ5DaGtOeg/zwvbJoi/t4djsrZi0+O51Fh150nSJXPWFjhnYEadhvSSGhW2cVvXKhwOpL6vkbVhOP43K1lnaHczkVJwJwVnh9CMRzqvGygmSEcCw8OniXByA7PspwWkEi4Ev4Gszu/kmO1fyyr+UCp4Fp8CcwbujH4ljYpLkx9woYRZDe5AlQ8U2Tqt65e/BxNFwXm2U37TUHk8oeyOPtqnS5h7gEDldSVTz/UccAhhWXGCWwiNgYVgsQAiIoPTfiBqM3tyHcwjnujagI4R0zefOsAgh8ULDIoREAw2LEBINNCxCSDTQsAgh0UDDIoREAw2LEBINNCxCSDTQsAgh0UDDIoREAw2LEBINNCxCSDTQsAgh0UDDIoREAw2LEBINNCxCSDTQsAgh0UDDIoREAw2LEBINNCxCSDTQsAgh0UDDIoREAw2LEBINNCxCSDTQsAgh0UDDIoREwqVL/w8KSyqJVFfZUwAAAABJRU5ErkJggg==

            $data = base64_decode($image_array_2[1]);

            $imageName = time() . '.png';

            file_put_contents('uploads/' . $imageName, $data);

            return json_encode([
                'path' => '<img src="'.'/uploads/'.$imageName.'" class="img-thumbnail" />',
                'name' => $imageName
            ]);

        }

    }

    public function actionRegister()
    {
        $params = Yii::$app->request->getQueryParams();

        $region_list = (new Query())->select(['*'])->from('regions')->all();

        $model_form = new UploadForm();

        if (Yii::$app->request->isPost) {
            if(!empty($_POST['account_type'])){
                $u_m = (new Query())->select(['id'])->from('users as u')->where('u.username = ' . "'" . $_POST['username'] . "'")->count();//"SELECT * FROM `images` as img JOIN `products` as p on img.id = p.main_image LIMIT 4")->all();
                $u_v = (new Query())->select(['id'])->from('users_validation as u')->where('u.username = ' . "'" . $_POST['username'] . "'")->count();//"SELECT * FROM `images` as img JOIN `products` as p on img.id = p.main_image LIMIT 4")->all();
                if($u_m > 0 || $u_v) {
                    return json_encode([
                        'status' => 0,
                        'info' => 'Ծածկանունը զբաղված է: Փորձեեք կրկին ծածկանունը փոխելուց հետո:',
                    ]);
                }
                date_default_timezone_set('America/New_York');
                $datetime = date('Y-m-d H:i:s');

               switch ($_POST['account_type']){
                    case 'personal':
                        try {
                            //['first_name', 'middle_name', 'last_name', 'username', 'password', 'region_id', 'city_id', 'phone', 'phone_secondary', 'email', 'location_x', 'location_y', 'address', 'visible', 'status']
                            $user = (new Query())->createCommand()->batchInsert('users_validation', ['first_name', 'middle_name', 'last_name', 'username', 'password','image', 'region_id', 'city_id', 'phone', 'phone_secondary', 'email', 'type', 'visible','status', 'date_registered'],
                                                                            [[  htmlspecialchars($_POST['first_name']),
                                                                                htmlspecialchars($_POST['middle_name']),
                                                                                htmlspecialchars($_POST['last_name']),
                                                                                htmlspecialchars($_POST['username']),
                                                                                htmlspecialchars($_POST['password']),
                                                                                htmlspecialchars($_POST['avatar_name']),
                                                                                htmlspecialchars($_POST['region_id']),
                                                                                htmlspecialchars($_POST['city_id']),
                                                                                htmlspecialchars($_POST['phone_main']),
                                                                                htmlspecialchars($_POST['phone_secondary']),
                                                                                htmlspecialchars($_POST['email']),
                                                                                1, '1', '0',
                                                                                $datetime
                                                                                ]])->execute();
                            return json_encode([
                                'status' => 1,
                                'info' => '',
                            ]);
                        } catch (Exception $ex) {
                            return json_encode([
                                'status' => 0,
                                'info' => 'Տեղի է ունեցել սխալ, խնդրում ենք փորձել մի փոքր ուշ:',
                                'dev' => json_encode($ex)
                            ]);
                        }
                    break;
                    case 'company':
                        $user = (new Query())->createCommand()->batchInsert('users_validation', ['first_name', 'address','location_x', 'location_y', 'web_page', 'username', 'password','image', 'region_id', 'city_id', 'phone', 'phone_secondary', 'email', 'type', 'visible','status', 'date_registered'],
                            [[  htmlspecialchars($_POST['company_name']),
                                htmlspecialchars($_POST['address']),
                                htmlspecialchars($_POST['cor_x']),
                                htmlspecialchars($_POST['cor_y']),
                                htmlspecialchars($_POST['web_page']),
                                htmlspecialchars($_POST['username']),
                                htmlspecialchars($_POST['password']),
                                htmlspecialchars($_POST['avatar_name']),
                                htmlspecialchars($_POST['region_id']),
                                htmlspecialchars($_POST['city_id']),
                                htmlspecialchars($_POST['phone_main']),
                                htmlspecialchars($_POST['phone_secondary']),
                                htmlspecialchars($_POST['email']),
                                2, '1', '0',$datetime]])->execute();

                                return json_encode([
                                    'status' => 1,
                                    'info' => '',
                                ]);
                    break;
                    case 'shop':
                        $user = (new Query())->createCommand()->batchInsert('users_validation', ['first_name', 'address', 'location_x', 'location_y', 'web_page', 'username', 'password','image', 'region_id', 'city_id', 'phone', 'phone_secondary', 'email', 'type', 'visible','status', 'date_registered'],
                            [[  htmlspecialchars($_POST['shop_name']),
                                htmlspecialchars($_POST['address']),
                                htmlspecialchars($_POST['cor_x']),
                                htmlspecialchars($_POST['cor_y']),
                                htmlspecialchars($_POST['web_page']),
                                htmlspecialchars($_POST['username']),
                                htmlspecialchars($_POST['password']),
                                htmlspecialchars($_POST['avatar_name']),
                                htmlspecialchars($_POST['region_id']),
                                htmlspecialchars($_POST['city_id']),
                                htmlspecialchars($_POST['phone_main']),
                                htmlspecialchars($_POST['phone_secondary']),
                                htmlspecialchars($_POST['email']),
                                3, '1', '0', $datetime]])->execute();

                                return json_encode([
                                    'status' => 1,
                                    'info' => '',
                                ]);
                    break;
                }

            }
            $model_form->imageFiles = UploadedFile::getInstances($model_form, 'imageFiles');
            if ($model_form->upload()) {
                // file is uploaded successfully
                return json_decode([
                    'status' => 1,
                    'files' => $model_form->imageFiles
                ]);
            }
        }

        return $this->render('register', ['model' => 'user','model_form' => $model_form, 'region_list' => $region_list]);
    }
    public function actionLogOut()
    {
        if(!empty($_SESSION['user'])){
            unset($_SESSION['user']);
        }

        Yii::$app->response->redirect(['main/']);
    }

    public function actionProfile()
    {
        $params = Yii::$app->request->getQueryParams();
        $id = null;
        if(!empty($_SESSION['user'])) {
            $id = $_SESSION['user'][0]['id'];
        }
        $user = [];
        if(!empty($params['id'])) {
            $id = $params['id'];
        }
        if($id == null) {
            $this->redirect('/');
        }
        $user = (new Query())->select(['u.*', 'utr.*'])->from('users as u')->join('INNER JOIN','user-type-relation as utr', 'utr.type = u.type' )->where('u.id=' .  $id)->all();

        $list = (new Query())->select(['*'])->from('store_products')->where('owner_id = ' .$id)->orderBy(['updated_time' => SORT_DESC])->all();

        return $this->render('profile', ['model' => 'user', 'list' => $list, 'params' => $params, 'other_user' => $user]);
    }

    public function actionLogin()
    {
        $params = Yii::$app->request->getQueryParams();

        if(empty($_POST['u']) || empty($_POST['p'])){
            return json_encode([
                'status' => 0,
                'info' => 'Լրացրեք բոլոր դաշտերը:'
            ]);
        }

        $user = (new Query())->select(['u.*', 'utr.*'])->from('users as u')->join('INNER JOIN','user-type-relation as utr', 'utr.type = u.type' )->where('u.username=' . '"' . $_POST['u'] . '"')->andWhere('u.password=' . '"' . $_POST['p'] . '"')->andWhere('u.visible = "1"')->all();

        if(empty($user)){
            return json_encode([
                'status' => 0,
                'info' => 'Սխալ մուտքագրում: Ստուգեք տվյալները և փորձեք նորից:'
            ]);
        }

        $session = Yii::$app->session;
        $session['user'] = $user;
        if($user[0]['id'] == 1){
            return json_encode([
                'status' => 1,
                'redirect' => '/admin/users'
            ]);
        }
        return json_encode([
            'status' => 1,
            'redirect' => ''
        ]);
    }


    public function actionInsert()
    {

        $locations = [["Երևան"],["      Աջափնյակ"],["      Արաբկիր"],["      Ավան"],["      Դավիթաշեն"],["      Էրեբունի"],["      Քանաքեռ Զեյթուն"],["      Կենտրոն"],["      Մալաթիա Սեբաստիա"],["      Նոր Նորք"],["      Նորք Մարաշ"],["      Նուբարաշեն"],["      Շենգավիթ"],["Արագածոտն"],["      Ապարան"],["      Արագած"],["      Աշտարակ"],["      Կոշ"],["      Թալին"],["      Ուջան"],["Արարատ"],["      Արարատ"],["      Արտաշատ"],["      Գեղանիստ"],["      Մասիս"],["      Վեդի"],["Արմավիր"],["      Արմավիր"],["      Էջմիածին"],["      Մեծամոր"],["Արցախ"],["      Ասկերան"],["      Մարտակերտ"],["      Մարտունի"],["      Շուշի"],["      Ստեփանակերտ"],["Գեղարքունիք"],["      Ճամբարակ"],["      Գավառ"],["      Մարտունի "],["      Սևան"],["      Վարդենիս"],["Կոտայք"],["      Աբովյան"],["      Աղվերան"],["      Արգել"],["      Առինջ"],["      Բջնի"],["      Բյուրեղավան"],["      Չարենցավան"],["      Գառնի"],["      Հրազդան"],["      Ջրվեժ"],["      Քանաքեռավան"],["      Քասախ"],["      Նոր Հաճըն"],["      Պտղնի"],["      Եղվարդ"],["      Զովունի"],["Լոռի"],["      Ալավերդի"],["      Սպիտակ"],["      Ստեփանավան"],["      Տաշիր"],["      Վանաձոր"],["Շիրակ"],["      Արթիկ"],["      Գյումրի"],["      Մարալիկ"],["Սյունիք"],["      Գորիս"],["      Քաջարան"],["      Կապան"],["      Մեղրի"],["      Սիսիան"],["Տավուշ"],["      Բերդ"],["      Դիլիջան"],["      Իջևան"],["      Նոյեմբերյան"],["Վայոց Ձոր"],["      Ջերմուկ"],["      Վայք"],["      Եղեգնաձոր"],["Հայաստանից դուրս"]];

        $products_specifications = (new Query())->createCommand()->batchInsert('regions', ['title'], $locations)->execute();


        return $this->render('login', ['model' => 'main' ]);
    }


    public function actionInfo() {
            $info = UsersInfo::findOne(['user_id' => $_SESSION['user'][0]['id']]);
            return $this->render('info', ['model' => 'user', 'info' => $info]);
    }

    public function actionChangePassword() {
        $params = Yii::$app->request->getQueryParams();

        if (Yii::$app->request->isPost) {
            if(!empty($_POST['old']) && !empty($_POST['new_p'])){
                    if($_POST['old'] != $_SESSION['user'][0]['password']){
                     return json_encode([
                        'status' => 0,
                         'info' => 'Ծածկանունը սխալ է: Ստուգեք սխալները և փորձեք կրկին:'
                     ]);
                    }
                    $model = Users::findOne($_SESSION['user'][0]['id']);
                    $model->password = htmlspecialchars($_POST['new_p']);
                    $model->save();

                $user = (new Query())->select(['u.*', 'utr.*'])->from('users as u')->join('INNER JOIN','user-type-relation as utr', 'utr.type = u.type' )->where('u.id=' .  $_SESSION['user'][0]['id'])->all();

                $_SESSION['user'] = $user;

                return json_encode([
                    'status' => 1,
                    'info' => ''
                ]);

            } else {
                return json_encode([
                    'status' => 0,
                    'info' => 'Տվյալները լիարժեք չեն:'
                ]);
            }
        }
        return $this->render('change-password', ['model' => 'user' ]);
    }

    public function actionChangeInfo() {
        $params = Yii::$app->request->getQueryParams();

        if (Yii::$app->request->isPost) {

            $model = UsersInfo::findOne(['user_id' => $_SESSION['user'][0]['id']]);
            if(empty($model)) {
                $model = new UsersInfo();
            }
            $model->user_id = intval($_SESSION['user'][0]['id']);
            $model->more = htmlspecialchars($_POST['more']);
            $model->facebook = htmlspecialchars($_POST['fb']);
            $model->viber = htmlspecialchars($_POST['vb']);
            $model->save();

            return json_encode([
                'status' => 1,
                'info' => ''
            ]);
        } else {
            return json_encode([
                'status' => 0,
                'info' => 'Տվյալները լիարժեք չեն:'
            ]);
        }
    }

    public function actionHistory()
    {
        $params = Yii::$app->request->getQueryParams();

        $follows = [];
        if(!empty($_SESSION['user'])){
            $follows_ = (new Query())->select(['*'])->from('follows as f')->where('owner_id = ' . intval($_SESSION['user'][0]['id']))->all();

            foreach($follows_ as $key => $value){
                $follows[$value['sp_id']] = $value['date'];
            }
        }

        $history_items= [];
        $history = [];

        if(!empty($_COOKIE['$h' . $_SESSION['user'][0]['id']])) {
            $history = json_decode($_COOKIE['$h' . $_SESSION['user'][0]['id']]);
            $history_id_list = '(';
            foreach ($history as $key => $value) {
                $history[$key] = json_decode($value);
                $history_id_list .= json_decode($value)[1];
                if ($key < count($history) - 1) $history_id_list .= ', ';
            }
            $history_id_list .= ')';
            $history_items = (new Query())->select(['p.*'])->from('store_products as p')->where('p.id in ' . $history_id_list)->all();//"SELECT * FROM `images` as img JOIN `products` as p on img.id = p.main_image LIMIT 4")->all();

            foreach($history as $key => $value) {
                for ($x = 0; $x < count($history_items); $x++) {
                    if($value[1] == $history_items[$x]['id']) {
                        $history[$key] = $history_items[$x];
                    }
                }
            }
            $history = array_reverse($history);
        }

        return $this->render('history', ['model' => 'user', 'history_items' => $history, 'follows' => $follows]);
    }

    public function actionLiked(){
        $params = Yii::$app->request->getQueryParams();
        $liked_items = (new Query())->select(['sp.*', 'ul.date as like_date'])->from('follows as ul')->join('INNER JOIN', 'store_products as sp', 'sp.id = ul.sp_id')->where('ul.owner_id = ' . $_SESSION['user'][0]['id'])->orderBy('like_date DESC')->all();//"SELECT * FROM `images` as img JOIN `products` as p on img.id = p.main_image LIMIT 4")->all();

        $follows = [];
        if(!empty($_SESSION['user'])){
            $follows_ = (new Query())->select(['*'])->from('follows as f')->where('owner_id = ' . intval($_SESSION['user'][0]['id']))->all();

            foreach($follows_ as $key => $value){
                $follows[$value['sp_id']] = $value['date'];
            }
        }

        return $this->render('liked', ['model' => 'user','follows' => $follows, 'liked_items' => $liked_items]);
    }

    public function actionAd(){
        $params = Yii::$app->request->getQueryParams();


        return $this->render('ad', ['model' => 'user']);
    }

    public function actionChangeListType(){
        if (Yii::$app->request->isPost) {
            $type = $_POST['type'];
            if($type != 'inline' && $type != 'block') {
                $type = 'block';
            }
            $_SESSION['list-type'] = $type;
            return json_encode([
                'status' => 1,
            ]);
        }
    }

    public function actionGetListType(){
            $type = $_SESSION['list-type'];

           return json_encode([
               'status' => 1,
               'type' => $type
           ]);
    }

    public function actionPersonal(){
        $params = Yii::$app->request->getQueryParams();

        $user = (new Query())->select(['u.*', 'utr.*'])->from('users as u')->join('INNER JOIN','user-type-relation as utr', 'utr.type = u.type' )->where('u.id=' .  $_SESSION['user'][0]['id'])->all();

        $_SESSION['user'] = $user;
        $model_form = new UploadForm();
        if (Yii::$app->request->isPost) {
            date_default_timezone_set('America/New_York');
            $datetime = date('Y-m-d H:i:s');

            switch ($_POST['account_type']) {
                case 'personal':
                        //['first_name', 'middle_name', 'last_name', 'username', 'password', 'region_id', 'city_id', 'phone', 'phone_secondary', 'email', 'location_x', 'location_y', 'address', 'visible', 'status']

                        $model = Users::findOne($_SESSION['user'][0]['id']);
                        $model->first_name = $_POST['first_name'];
                        $model->last_name = $_POST['last_name'];
                        $model->middle_name = $_POST['middle_name'];
                        $model->username = $_POST['username'];
                        $model->region_id = $_POST['region_id'];
                        $model->city_id = $_POST['city_id'];
                        $model->phone = $_POST['phone_main'];
                        $model->phone_secondary = $_POST['phone_secondary'];
                        $model->phone_secondary = $_POST['phone_secondary'];
                        $model->image = $_POST['avatar_name'];
                        $model->email = $_POST['email'];
                        $model->save();

                        return json_encode([
                            'status' => 1,
                            'info' => '',
                        ]);
                    break;
                case 'company':

                    $model = Users::findOne($_SESSION['user'][0]['id']);
                    $model->first_name = $_POST['company_name'];
                    $model->username = $_POST['username'];
                    $model->address = $_POST['address'];
                    $model->web_page = $_POST['web_page'];
                    $model->location_x = $_POST['cor_x'];
                    $model->location_y = $_POST['cor_y'];
                    $model->region_id = $_POST['region_id'];
                    $model->city_id = $_POST['city_id'];
                    $model->phone = $_POST['phone_main'];
                    $model->phone_secondary = $_POST['phone_secondary'];
                    $model->phone_secondary = $_POST['phone_secondary'];
                    $model->image = $_POST['avatar_name'];
                    $model->email = $_POST['email'];
                    $model->save();

                    return json_encode([
                        'status' => 1,
                        'info' => '',
                    ]);
                    break;
                case 'shop':

                    $model = Users::findOne($_SESSION['user'][0]['id']);
                    $model->first_name = $_POST['shop_name'];
                    $model->username = $_POST['username'];
                    $model->address = $_POST['address'];
                    $model->web_page = $_POST['web_page'];
                    $model->location_x = $_POST['cor_x'];
                    $model->location_y = $_POST['cor_y'];
                    $model->region_id = $_POST['region_id'];
                    $model->city_id = $_POST['city_id'];
                    $model->phone = $_POST['phone_main'];
                    $model->phone_secondary = $_POST['phone_secondary'];
                    $model->phone_secondary = $_POST['phone_secondary'];
                    $model->image = $_POST['avatar_name'];
                    $model->email = $_POST['email'];
                    $model->save();

                    return json_encode([
                        'status' => 1,
                        'info' => '',
                    ]);
                    break;
            }

            $model_form->imageFiles = UploadedFile::getInstances($model_form, 'imageFiles');
            if ($model_form->upload()) {
                // file is uploaded successfully
                return json_decode([
                    'status' => 1,
                    'files' => $model_form->imageFiles
                ]);
            }
        }

        date_default_timezone_set('America/New_York');
        $datetime = date('Y-m-d H:i:s');
        $region_list = (new Query())->select(['*'])->from('regions')->all();

        $city_list = [];
        $city_list = (new Query())->select(['*'])->from('places')->where('region_id = ' . $_SESSION['user'][0]['region_id'])->all();


        return $this->render('personal', ['model' => 'user', 'region_list' => $region_list, 'city_list' => $city_list]);
    }

    public function actionFollowProduct()
    {
        if(Yii::$app->request->isPost) {

        $product_id = $_POST['product_id'];
        $like = (new Query())->select(['*'])->from('follows as f')->where('owner_id = ' . intval($_SESSION['user'][0]['id']))->andWhere('sp_id = ' . $product_id)->one();

        date_default_timezone_set('America/New_York');
        $datetime = date('Y-m-d H:i:s');


        $status = 0;
        if(empty($like)){
            $addlike = (new Query())->createCommand()->batchInsert('follows', ['owner_id', 'sp_id', 'date'], [[intval($_SESSION['user'][0]['id']), $product_id, $datetime ]])->execute();
            $status = 1;
        } else {
            $removelike = (new Query())->createCommand()->delete('follows',
                [
                    'owner_id' => $_SESSION['user'][0]['id'],
                    'sp_id' => $product_id
                ])->execute();

            $status = -1;
        }

            return $status;
        }

        return false;
    }

}
