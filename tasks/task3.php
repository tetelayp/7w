<h2>Задание 3</h2>
<p>
    Дана таблица в базе MySQL с полями:
    id  - ключ
    name  имя,
    parent ссылка на id родителя,

    Данную таблицу нужно заполнить рандомными значениями, но так что бы получилось дерево с несколькими (от 0 до 5) уровнями вложенности

    Реализовать алгоритм выводящий это дерево, вида:

<ul>
    <li>
        EEE
        <ul>
            <li>
                KK
            </li>
            <li>
                LK
            </li>
        </ul>
    </li>
    <li>
        RE
    </li>
    <li>
        LO
        <ul>
            <li>
                EW
            </li>
            <li>
                FS
            </li>
        </ul>
    </li>
    <li>
        DF
        <ul>
            <li>
                JJJ
                <ul>
                    <li>
                        WW
                    </li>
                    <li>
                        LL
                        <ul>
                            <li>
                                SS
                                <ul>
                                    <li>
                                        SD
                                    </li>
                                    <li>
                                        HR
                                        <ul>
                                            <li>
                                                JS
                                                <ul>
                                                    <li>
                                                        PP
                                                    </li>
                                                </ul>
                                            </li>
                                            <li>
                                                ET
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li>
                ED
            </li>
            <li>
                AC
            </li>
        </ul>
    </li>
    <li>
        PPP
    </li>
</ul>


<p>
    и т.д.
</p>