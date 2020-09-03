<template>
    <div>
        <div class="p-4 slider">
            <h1 class="mt-5 d-flex justify-content-center">Documentation</h1>
        </div>
        <div class="row align-items-center">
            <b-card no-body class="overflow-hiddenp-3" bg-variant="dark" text-variant="white">
                <b-row no-gutters>
                    <b-col md="3" class="d-flex justify-content-center">
                        <b-card-img src="img/doc0.png" class="docImg"></b-card-img>
                    </b-col>
                    <b-col md="9">
                        <b-card-body class="p-5" title="Quand découvrirez-vous les erreurs ?">
                            <b-card-text class="py-5">
                                Les langages compilés doivent connaître le type de chaque variable, le type de retour de
                                chaque méthode, etc. avant que le programme ne s'exécute. C'est pourquoi le compilateur
                                doit s'assurer que le programme est "correct" et se fera un plaisir de vous signaler ce
                                genre d'erreurs dans le code source, comme appeler une méthode indéfinie ou passer un
                                mauvais nombre d'arguments à une fonction. Le compilateur agit comme une première ligne
                                de défense avant que vous ne puissiez déployer l'application en production.
                                <br />D'un autre côté, PHP n'est pas du tout comme ça. Si vous faites une erreur, le
                                programme se bloque lorsque la ligne de code contenant l'erreur est exécutée. Lorsqu'ils
                                testent une application PHP, que ce soit manuellement ou automatiquement, les
                                développeurs passent beaucoup de temps à découvrir des erreurs qui ne seraient même pas
                                compilées dans d'autres langages, ce qui laisse moins de temps pour tester la logique
                                commerciale réelle.
                            </b-card-text>
                        </b-card-body>
                    </b-col>
                </b-row>
            </b-card>
        </div>
        <div class="row align-items-center">
            <b-card no-body class="overflow-hiddenp-3" bg-variant="white">
                <b-row no-gutters>
                    <b-col md="9">
                        <b-card-body class="p-5" title="Utiliser GitChecker">
                            <b-card-text class="py-5">
                                En suivant les pratiques modernes du PHP, on obtient des bases de code où l'on peut être
                                sûr du type de beaucoup de données, qui convergent avec les langages à caractères
                                statiques, bien que la nature dynamique soit toujours présente. Les bases de code PHP
                                modernes sont similaires à celles des langues dont les gens se moquent beaucoup moins.
                                Le code orienté objet, l'injection de dépendances et l'utilisation de modèles de
                                conception établis sont vraiment courants de nos jours.
                                <br />Ce qui m'a conduit à l'idée d'un outil d'analyse statique pour PHP qui
                                remplacerait le rôle du compilateur d'autres langages. J'ai passé beaucoup de temps à
                                travailler dessus et j'utilise ses différentes versions de développement en vérifiant
                                notre base de code depuis plus d'un an.
                                <br>Il s'appelle GitChecker, il est open-source et gratuit.
                            </b-card-text>
                        </b-card-body>
                    </b-col>
                    <b-col md="3" class="d-flex justify-content-center">
                        <b-card-img src="img/doc1.png" class="docImg"></b-card-img>
                    </b-col>
                </b-row>
            </b-card>
        </div>
        <div class="row align-items-center">
            <b-card no-body class="overflow-hiddenp-3" bg-variant="dark" text-variant="white">
                <b-row no-gutters>
                    <b-col md="3" class="d-flex justify-content-center">
                        <b-card-img src="img/doc2.png" class="docImg"></b-card-img>
                    </b-col>
                    <b-col md="9">
                        <b-card-body class="p-5" title="Qu'est-ce qu'il vérifie actuellement ? ">
                            <b-card-text class="py-5">
                                Existence de classes utilisées dans les instances, les captures, les typographies et
                                autres constructions linguistiques. PHP ne vérifie pas cela et reste à la place, rendant
                                le code entouré inutilisé.
                                <br />Existence et accessibilité des méthodes et fonctions appelées. Il vérifie
                                également le nombre d'arguments passés.
                                Si une méthode renvoie le même type que celui qu'elle déclare renvoyer.
                                <br>L'existence et la visibilité des propriétés accessibles. Il indique également si un
                                type différent de celui déclaré est attribué à la propriété.
                                Nombre correct de paramètres passés aux appels sprintf/printf en fonction des chaînes de
                                format.
                                <br>Existence de variables tout en respectant les portées des branches et des boucles.
                                <br>Casting inutile comme (string) 'foo' et comparaisons strictes (=== et !==) avec
                                différents types d'opérandes qui donnent toujours des faux.
                                La liste s'allonge à chaque nouvelle version. Mais ce n'est pas la seule chose qui rend
                                GitChecker utile.
                            </b-card-text>
                        </b-card-body>
                    </b-col>
                </b-row>
            </b-card>
        </div>
        <div class="row align-items-center">
            <b-card no-body class="overflow-hiddenp-3" bg-variant="white">
                <b-row no-gutters>
                    <b-col md="9">
                        <b-card-body class="p-5" title="Gitchecker est rapide et extensible">
                            <b-card-text class="py-5">
                                Il parvient à vérifier l'ensemble de la base de données en un seul passage. Il n'a pas
                                besoin de passer par le code plusieurs fois. Et il suffit de passer par le code que vous
                                souhaitez analyser, par exemple le code que vous avez écrit. Il n'a pas besoin
                                d'analyser les dépendances de tiers. Il utilise plutôt la réflexion pour trouver des
                                informations utiles sur le code de quelqu'un d'autre que votre base de code utilise.
                                <br />GitChecker est capable de vérifier notre base de code (6000 fichiers, 600k LOCs)
                                en une minute environ. Et il se vérifie lui-même en moins d'une seconde.
                                <br>Même avec les pratiques actuelles de typage statique, un développeur peut parfois
                                justifier l'utilisation de fonctionnalités dynamiques de PHP comme les méthodes __get,
                                __set et __call magic. Elles permettent de définir de nouvelles propriétés et méthodes
                                de façon dynamique en cours d'exécution. Normalement, l'analyse statique se plaindrait
                                d'accéder à des propriétés et méthodes non définies, mais il existe un mécanisme
                                permettant de dire au moteur les règles de création exacte des nouvelles propriétés et
                                méthodes.
                                <br>Ceci est rendu possible grâce à une abstraction personnalisée sur la réflexion
                                native de PHP qui permet à l'utilisateur de définir des extensions.
                                <br>Le type de retour de certaines méthodes dépend de ses arguments. Il peut dépendre du
                                nom de la classe que vous lui passez ou il peut retourner un objet de la même classe que
                                l'objet que vous lui avez passé. C'est à cela que servent les extensions de type de
                                retour dynamique.
                                <br>
                            </b-card-text>
                        </b-card-body>
                    </b-col>
                    <b-col md="3" class="d-flex justify-content-center">
                        <b-card-img src="img/doc3.png" class="docImg"></b-card-img>
                    </b-col>
                </b-row>
            </b-card>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log("Component mounted.");
        },
    };

</script>
