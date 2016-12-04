# Laddningstid och användbarhet

Kort analys av fyra webbplatsers laddningstid.

Första sajten, [css-tricks.com](https://css-tricks.com), valde jag för att jag lyssnar på podcasten [shoptalkshow](http://shoptalkshow.com/). I de senaste avsnitten har de diskuterat laddningstider, framförallt för mobil, och därför tycker jag att det kan vara intressant att analysera en sida som en av podcastpratarna skapat.

Jag har också valt två sajter som är tidningar, en dagstidning, [sydsvenskan.se](https://sydsvenskan.se), och ett tekniskt inriktat magasin, [wired.com](https://wired.com).

Sista sajten är mitt eget företags hemsida, [tandlakarenygren.se](http://tandlakarenygren.se). Sidan har en del problem, och ett av dem är en orimligt lång laddningstid. En analys kanske kan hjälpa till att avgöra om sidan ska optimeras eller göras om från grunden.

När jag mätte sidornas laddningstid med DevTools valde jag att trottla till "Regular 3G" (100ms, 750KB, 250KB). Detta gjorde jag för att det behövs en basnivå så att mätningarna går att upprepa någorlunda. För normalt mobilsurfande tycker jag att "Regular 3G" är ett ganska bra medel.

Tabellförklaringar |  |
-----------------|---|
PMS   |PageSpeed Insights - Mobile Speed
PMUX  |PageSpeed Insights - Mobile User Experience
PSD   |PageSpeed Insights - Desktop
DTPS  |DevTools Page Speed
DTR   |DevTools Page Resources
DTS   |DevTools Page total Size

## [CSS-Tricks](https://css-tricks.com)

|         | PMS   | PMUX  | PSD   | DTPS   | DTR   | DTS   |
|---------|-------|-------|-------|--------|-------|-------|
| Blog    |57/100 |99/100 |80/100 |5.86s   |38     |481KB  |
| Forums  |55/100 |99/100 |77/100 |5.98s   |38     |239KB  |
| Shop    |59/100 |99/100 |82/100 |9.84s   |41     |744KB  |

Samtliga sidor laddar hyggligt snabbt även på en mobil, och vet man om att man sitter med lite sämre uppkoppling känns det inte orimligt. Bilderna i shoppen är optimerade vad gäller storlek. Överlag känns det som att de tänkt på att sidan ska fungera väl på många enheter.

Google PageSpeed klagar framförallt på renderingsblockerande javascript och css vilket man skulle kunna överväga att åtgärda. De bilder som Google PageSpeed anmärker på verkar tillhöra reklam. Reklamen laddas in sist och utvecklarna har placerat den så att inte huvudinnehållet hoppar till när reklamen laddat färdigt.

## [Sydsvenskan](https://sydsvenskan.se)

|         | PMS   | PMUX  | PSD   | DTPS   | DTR   | DTS   |
|---------|-------|-------|-------|--------|-------|-------|
| Förstasida     |60/100 |98/100 |76/100 |24.51s   |200     |2MB |
| Toppnyhet       |62/100 |99/100 |77/100 |15.14s   |119     |1.4MB  |
| Nyhetsdygnet   |63/100 |93/100 |78/100 |8.11s    |69     |661KB  |

Förstasidan laddar långsamt på 3G. Topprubriken kommer rätt tidigt men tänker man klicka på topprubriken innan sidan laddat annons och bilder kan det bli besvärligt.

Rubriken hoppar upp och ner medan sidan laddar. Man riskerar att råka klicka på första annonsen istället för artikeln, då annonsen tar topplatsen efter en stund. Förstasidan är bildintensiv och PageSpeed föreslår att bilderna ska skickas komprimerade.

## [Wired](https://wired.com)

|         | PMS   | PMUX  | PSD   | DTPS   | DTR   | DTS   |
|---------|-------|-------|-------|--------|-------|-------|
| Förstasida     |63/100 |99/100 |83/100 |36.56s   |258     |2.9MB |
| Toppnyhet       |64/100 |99/100 |79/100 |25.59s   |216     |1.8MB  |
| Video          |60/100 |99/100 |74/100 |42.82s    |251     |3.2MB  |

Wireds hemsida tar längre tid att ladda på 3G, och får liknande betyg som Sydsvenskan av PageSpeed. Ändå känns sidan något snabbare. Förmodligen beror det på att ramarna för artiklar laddar tidigt, och sedan fylls med innehåll utan att sidan hoppar. Bilderna till artikelrutorna laddar också ganska tidigt vilket får sidan att börja se färdigladdad ut. När reklamen laddas hoppar sidan en del med risk för felklick.

## [tandlakarenygren.se](http://tandlakarenygren.se)

|         | PMS   | PMUX  | PSD   | DTPS   | DTR   | DTS   |
|---------|-------|-------|-------|--------|-------|-------|
| Förstasida    |60/100 |80/100 |76/100 |18.05s   |84     |928KB  |
| Vår klinik    |52/100 |92/100 |75/100 |13.63s   |92     |1.1MB  |
| Kontakt       |63/100 |91/100 |80/100 |5.28s   |36    |297KB  |

Mitt företags hemsida har som sagt vissa problem, men detta är första gången jag analyserar den. Förstasidans laddningstid är enligt mig det största problemet. Sidan ska fungera som reklampelare och om det tar 18 sekunder att få upp sidan på en mobil är risken att man förlorar kunder redan innan de sett sidan. PageSpeed noterar att responstiden för servern är >1.5s vilket känns som en onormalt lång tid. Kan det bero på att det är en wordpress-sajt som kanske inte är rätt konfigurerad?

Det finns även problem med responsiviteten, på en mobil ryms tex inte loggan.

Detta är intressant nog den enda sajt i analysen som inte får anmärkning på "Prioritize visible content". Det kan kanske förklaras med att sidan inte är mycket mer än en skärmbild stor.

Jag tycker tyvärr inte att analysen gav mig något bra svar på om sidan ska skrivas om från grunden eller bara optimeras. Det räcker kanske att ta bort några element från förstasidan för att få upp hastigheten.

## Sammanfattning

Google PageSpeed klagar generellt på små länkar eller "tap targets." Det kan vara värt att tänka på. Som teknikintresserade utvecklare har vi nog ofta kraftfulla telefoner med stora skärmar och missar därför lätt att kontrollera att det ska gå att navigera enkelt även på en liten skärm.

Ett annat generellt förbättringsförslag från PageSpeed är att ladda javascript och CSS asynkront, eller i alla fall efter att den direkt synliga delen av sidan laddats.

Jag blev lite förvånad över det "oranga" betyget för de tre första sidorna vad gäller desktop. Surfandes på wifi med min laptop har jag sällan upplevt de sidorna som långsamma.

Min egen uppfatting om vad som är en snabb sida varierar efter förutsättingarna. Har jag inte mer än 3G accepterar jag längre laddningstid. För 3G ligger det nog på 2-3 sekunder för att jag ska uppleva sidan som snabb. Det räcker dock att sidan går att interagera med, så laddningstiderna i denna analys blir lite missvisande om det är användarupplevelsen man är ute efter att förstå. På CSS-Tricks går det att börja titta igenom listan av bloggposter redan efter ett par sekunder, innan sidan hunnit ladda helt färdigt. Även på wired kan man börja skrolla efter något intressant att läsa redan efter 8 sekunder, vilket är mindre än en fjärdedel av tiden till att sidan är helt laddad. "Time to interaction" är kanske ett bättre mått på hastighet, än total laddningstid.

När jag använder min laptop är jag mer krävande än när jag surfar på mobilen. Om jag inte är ute efter något som jag vet finns på just den hemsidan, eller något som är väldigt specifikt, så ligger tålamodströskeln för laddningstid mycket lågt. Under 3 s är bra, upp till 5 s  är ok men över 10 s så har jag redan försvunnit någon annanstans om jag inte vet att det var just dit jag skulle.

