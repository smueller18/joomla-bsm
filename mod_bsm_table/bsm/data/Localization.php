<?php
class Localization{
        /* REGION Global */
        const GLOBAL_DATEFORMAT = "d.m.Y";
        const GLOBAL_DATEFORMAT_YEARONLY = "Y";
        const GLOBAL_TIMEFORMAT = "H:i";
        const GLOBAL_PLACEHOLDER = "-";
        const GLOBAL_DELIMITER = ", ";
        const GLOBAL_DOWNLOAD = "Download";
        const GLOBAL_AJAX_LOADING = "Element wird geladen...";
        const GLOBAL_AJAX_ERROR_IN_SHORTCODE = "Aufgrund eines Fehlers k&ouml;nnen keine Daten angezeigt werden";
        const GLOBAL_ERROR_IN_SHORTCODE = "Aufgrund eines Fehlers k&ouml;nnen keine Daten angezeigt werden";
        const GLOBAL_CURRENCY = "&euro;";
        const GLOBAL_DECIMAL_POINT = ",";
        const GLOBAL_THOUSANDS_SEPARATOR = ".";
        //Arrays sind nicht als const definierbar
        public static $GLOBAL_DAYSOFWEEK = array(
                        0 => "So.",
                        1 => "Mo.",
                        2 => "Di.",
                        3 => "Mi.",
                        4 => "Do.",
                        5 => "Fr.",
                        6 => "Sa."
        );
        public static $GLOBAL_DAYSOFWEEK_LONG = array(
                        0 => "Sonntag,",
                        1 => "Montag,",
                        2 => "Dienstag,",
                        3 => "Mittwoch,",
                        4 => "Donnerstag,",
                        5 => "Freitag,",
                        6 => "Samstag,"
        );
        /* ENDREGION Global */
        /* REGION Club */
        const CLUB_SEPARATOR_PHONE = self::CLUBLIST_SEPARATOR_PHONE;
        const CLUB_SEPARATOR_MOBILE = self::CLUB_SEPARATOR_PHONE;
        const CLUB_SEPARATOR_FAX = self::CLUB_SEPARATOR_PHONE;
        const CLUB_SEPARATOR_EMAIL = self::CLUB_SEPARATOR_PHONE;
        const CLUB_LABEL_PHONE = self::CLUBLIST_LABEL_PHONE;
        const CLUB_LABEL_MOBILE = self::CLUBLIST_LABEL_MOBILE;
        const CLUB_LABEL_FAX = self::CLUBLIST_LABEL_FAX;
        const CLUB_LABEL_HOMEPAGE = self::CLUBLIST_LABEL_HOMEPAGE;
        const CLUB_HEADLINE_SUCCESSES = "Erfolge";
        /* ENDREGION Club */
        /* REGION ClubList */
        const CLUBLIST_SEPARATOR_PHONE = "oder";
        const CLUBLIST_SEPARATOR_MOBILE = self::CLUBLIST_SEPARATOR_PHONE;
        const CLUBLIST_SEPARATOR_FAX = self::CLUBLIST_SEPARATOR_PHONE;
        const CLUBLIST_SEPARATOR_EMAIL = self::CLUBLIST_SEPARATOR_PHONE;
        const CLUBLIST_SEARCH_LEGEND = "Vereinssuche";
        const CLUBLIST_SEARCH_LABEL = "Verein";
        const CLUBLIST_SEARCH_PLACEHOLDER = "Suchbegriff eingeben...";
        const CLUBLIST_SEARCH_BUTTON = "Suchen";
        const CLUBLIST_SEARCH_NOENTRIES = "Es wurden keine passenden Vereine gefunden";
        const CLUBLIST_LABEL_PHONE = "Telefon";
        const CLUBLIST_LABEL_MOBILE = "Mobil";
        const CLUBLIST_LABEL_FAX = "Fax";
        const CLUBLIST_LABEL_HOMEPAGE = "Zur Website";
        /* ENDREGION ClubList */
        /* REGION ClubNavigator */
        const CLUBNAVIGATOR_LEGEND = "Navigation";
        const CLUBNAVIGATOR_LABEL = "Verein";
        const CLUBNAVIGATOR_BUTTON = "GO";
        const CLUBNAVIGATOR_EMPTYVALUE = "Alle";
        /* END REGION ClubNavigator */
        /* REGION ClubTable */
        const CLUBTABLE_SEARCH_LEGEND = self::CLUBLIST_SEARCH_LEGEND;
        const CLUBTABLE_SEARCH_LABEL = self::CLUBLIST_SEARCH_LABEL;
        const CLUBTABLE_SEARCH_PLACEHOLDER = self::CLUBLIST_SEARCH_PLACEHOLDER;
        const CLUBTABLE_SEARCH_BUTTON = self::CLUBLIST_SEARCH_BUTTON;
        const CLUBTABLE_SEARCH_NOENTRIES = self::CLUBLIST_SEARCH_NOENTRIES;
        const CLUBTABLE_CAPTION = "Vereine";
        const CLUBTABLE_COLUMN_NAME = "Verein";
        const CLUBTABLE_COLUMN_CONTACTINFO = "Kontaktname";
        const CLUBTABLE_COLUMN_ADDRESS = "Adresse";
        const CLUBTABLE_COLUMN_PHONE = self::CLUBLIST_LABEL_PHONE;
        const CLUBTABLE_COLUMN_MOBILE = self::CLUBLIST_LABEL_MOBILE;
        const CLUBTABLE_COLUMN_FAX = self::CLUBLIST_LABEL_FAX;
        const CLUBTABLE_COLUMN_EMAIL = "E-Mail";
        const CLUBTABLE_COLUMN_HOMEPAGE = "Website";
        const CLUBTABLE_COLUMN_VALUE_HOMEPAGE = self::CLUBLIST_LABEL_HOMEPAGE;
        const CLUBTABLE_SEPARATOR_PHONE = self::CLUBLIST_SEPARATOR_PHONE;
        const CLUBTABLE_SEPARATOR_MOBILE = self::CLUBLIST_SEPARATOR_MOBILE;
        const CLUBTABLE_SEPARATOR_FAX = self::CLUBLIST_SEPARATOR_FAX;
        const CLUBTABLE_SEPARATOR_EMAIL = self::CLUBLIST_SEPARATOR_EMAIL;
        /* END REGION ClubTable */
        /* REGION FieldList */
        const FIELDLIST_HEADLINE_ADDRESS = "Adresse";
        const FIELDLIST_HEADLINE_DESCRIPTION = "Wegbeschreibung";
        const FIELDLIST_HEADLINE_OTHERINFORMATION = "Weitere Informationen";
        const FIELDLIST_HEADLINE_GROUNDRULES = "Groundrules";
        /* ENDREGION FieldList */
        /* REGION Field */
        const FIELD_HEADLINE_ADDRESS = self::FIELDLIST_HEADLINE_ADDRESS;
        const FIELD_HEADLINE_DESCRIPTION = self::FIELDLIST_HEADLINE_DESCRIPTION;
        const FIELD_HEADLINE_OTHERINFORMATION = self::FIELDLIST_HEADLINE_OTHERINFORMATION;
        const FIELD_HEADLINE_GROUNDRULES = self::FIELDLIST_HEADLINE_GROUNDRULES;
        /* ENDREGION Field */
        /* REGION FunctionaryList */
        const FUNCTIONARYLIST_LABEL_PHONE = self::CLUBLIST_LABEL_PHONE;
        const FUNCTIONARYLIST_LABEL_MOBILE = self::CLUBLIST_LABEL_MOBILE;
        const FUNCTIONARYLIST_LABEL_FAX = self::CLUBLIST_LABEL_FAX;
        /* ENDREGION FunctionaryList */
        /* REGION FunctionaryTable */
        const FUNCTIONARYTABLE_COLUMN_FUNCTION = "Funktion";
        const FUNCTIONARYTABLE_COLUMN_PERSONNAME = "Funktion&auml;r";
        const FUNCTIONARYTABLE_COLUMN_PHOTO = "Bild";
        const FUNCTIONARYTABLE_COLUMN_ADDRESS = "Adresse";
        const FUNCTIONARYTABLE_COLUMN_PHONE = self::FUNCTIONARYLIST_LABEL_PHONE;
        const FUNCTIONARYTABLE_COLUMN_MOBILE = self::FUNCTIONARYLIST_LABEL_MOBILE;
        const FUNCTIONARYTABLE_COLUMN_FAX = self::FUNCTIONARYLIST_LABEL_FAX;
        const FUNCTIONARYTABLE_COLUMN_EMAIL = "E-Mail";
        /* ENDREGION FunctionaryTable */
        /* REGION LeagueTable */
        const LEAGUETABLE_CAPTION = "Ligen";
        const LEAGUETABLE_COLUMN_NAME = "Bezeichnung";
        const LEAGUETABLE_COLUMN_MANAGER = "Ligaobmann";
        const LEAGUETABLE_COLUMN_STATISTICIAN = "Statistikstelle";
        const LEAGUETABLE_COLUMN_UMPIRESELECTOR = "Umpire-Einteiler";
        const LEAGUETABLE_COLUMN_GAMEMODE = "Spielmodus";
        const LEAGUETABLE_COLUMN_ACRONYM = "Abk&uuml;rzung";
        const LEAGUETABLE_COLUMN_SPORTS = "Sportart";
        const LEAGUETABLE_COLUMN_AGECLASS = "Jahrg&auml;nge";
        const LEAGUETABLE_COLUMN_AGECLASS_FROM = "ab";
        const LEAGUETABLE_COLUMN_AGECLASS_TO = "-";
        const LEAGUETABLE_COLUMN_UMPIRESELECTION = "Umpirestellung";
        const LEAGUETABLE_COLUMN_SCORERSELECTION = "Scorerstellung";
        const LEAGUETABLE_COLUMN_SCOREREPORTING = "Ergebnisdienst";
        const LEAGUETABLE_COLUMN_GAMEROUNDMODEDESCRIPTION = "Aufstiegsregelungen / Playoffs";
        const LEAGUETABLE_COLUMN_FEE = "Geb&uuml;hr";
        const LEAGUETABLE_COLUMN_DEPOSIT = "Kaution";
        const LEAGUETABLE_COLUMN_UMPIREFIXEDRATE = "Umpire-Pauschale";
        /* END REGION LeagueTable */
        /* REGION League */
        const LEAGUE_HEADLINE_MANAGER = self::LEAGUETABLE_COLUMN_MANAGER;
        const LEAGUE_HEADLINE_STATISTICIAN = self::LEAGUETABLE_COLUMN_STATISTICIAN;
        const LEAGUE_HEADLINE_UMPIRESELECTOR = self::LEAGUETABLE_COLUMN_UMPIRESELECTOR;
        const LEAGUE_LABEL_PHONE = self::FUNCTIONARYLIST_LABEL_PHONE;
        const LEAGUE_LABEL_MOBILE = self::FUNCTIONARYLIST_LABEL_MOBILE;
        const LEAGUE_LABEL_FAX = self::FUNCTIONARYLIST_LABEL_FAX;
        const LEAGUE_HEADLINE_GAMEMODE = self::LEAGUETABLE_COLUMN_GAMEMODE;
        const LEAGUE_HEADLINE_GAMEROUNDMODEDESCRIPTION = self::LEAGUETABLE_COLUMN_GAMEROUNDMODEDESCRIPTION;
        const LEAGUE_HEADLINE_OTHERINFORMATION = "Weitere Informationen";
        const LEAGUE_LABEL_UMPIRESELECTION = self::LEAGUETABLE_COLUMN_UMPIRESELECTION;
        const LEAGUE_LABEL_SCORERSELECTION = self::LEAGUETABLE_COLUMN_SCORERSELECTION;
        const LEAGUE_LABEL_SCOREREPORTING = self::LEAGUETABLE_COLUMN_SCOREREPORTING;
        /* END REGION League */
        /* REGION LeagueGroupTable */
        const LEAGUEGROUPTABLE_CAPTION = self::LEAGUETABLE_CAPTION;
        const LEAGUEGROUPTABLE_COLUMN_NAME = self::LEAGUETABLE_COLUMN_NAME;
        const LEAGUEGROUPTABLE_COLUMN_GAMEMODE = self::LEAGUETABLE_COLUMN_GAMEMODE;
        const LEAGUEGROUPTABLE_COLUMN_ACRONYM = self::LEAGUETABLE_COLUMN_ACRONYM;
        const LEAGUEGROUPTABLE_COLUMN_MANAGER = self::LEAGUETABLE_COLUMN_MANAGER;
        const LEAGUEGROUPTABLE_COLUMN_STATISTICIAN = self::LEAGUETABLE_COLUMN_STATISTICIAN;
        const LEAGUEGROUPTABLE_COLUMN_UMPIRESELECTOR = self::LEAGUETABLE_COLUMN_UMPIRESELECTOR;
        const LEAGUEGROUPTABLE_COLUMN_UMPIRESELECTION = self::LEAGUETABLE_COLUMN_UMPIRESELECTION;
        const LEAGUEGROUPTABLE_COLUMN_SCORERSELECTION = self::LEAGUETABLE_COLUMN_SCORERSELECTION;
        const LEAGUEGROUPTABLE_COLUMN_SCOREREPORTING = self::LEAGUETABLE_COLUMN_SCOREREPORTING;
        const LEAGUEGROUPTABLE_COLUMN_MATCHES = "Spiele";
        const LEAGUEGROUPTABLE_COLUMN_CALENDAR = "Termine";
        const LEAGUEGROUPTABLE_COLUMN_TABLE = "Tabelle";
        const LEAGUEGROUPTABLE_COLUMN_VALUE_MATCHES = "Zum Spielplan";
        const LEAGUEGROUPTABLE_COLUMN_VALUE_TABLE = "Zur Tabelle";
        /* END REGION LeagueGroupTable */
        /* REGION LeagueGroup */
        const LEAGUEGROUP_HEADLINE_MANAGER = self::LEAGUE_HEADLINE_MANAGER;
        const LEAGUEGROUP_HEADLINE_STATISTICIAN = self::LEAGUE_HEADLINE_STATISTICIAN;
        const LEAGUEGROUP_HEADLINE_UMPIRESELECTOR = self::LEAGUE_HEADLINE_UMPIRESELECTOR;
        const LEAGUEGROUP_LABEL_PHONE = self::LEAGUE_LABEL_PHONE;
        const LEAGUEGROUP_LABEL_MOBILE = self::LEAGUE_LABEL_MOBILE;
        const LEAGUEGROUP_LABEL_FAX = self::LEAGUE_LABEL_FAX;
        const LEAGUEGROUP_HEADLINE_GAMEMODE = self::LEAGUE_HEADLINE_GAMEMODE;
        const LEAGUEGROUP_HEADLINE_OTHERINFORMATION = self::LEAGUE_HEADLINE_OTHERINFORMATION;
        const LEAGUEGROUP_LABEL_UMPIRESELECTION = self::LEAGUE_LABEL_UMPIRESELECTION;
        const LEAGUEGROUP_LABEL_SCORERSELECTION = self::LEAGUE_LABEL_SCORERSELECTION;
        const LEAGUEGROUP_LABEL_SCOREREPORTING = self::LEAGUE_LABEL_SCOREREPORTING;
        /* END REGION LeagueGroup */
        /* REGION LeagueGroupNavigator */
        const LEAGUEGROUPNAVIGATOR_LEGEND = "Navigation";
        const LEAGUEGROUPNAVIGATOR_LABEL = "Liga";
        const LEAGUEGROUPNAVIGATOR_BUTTON = "GO";
        const LEAGUEGROUPNAVIGATOR_EMPTYVALUE = "Alle";
        /* END REGION LeagueGroupNavigator */
        /* REGION LicenseList */
        const LICENSELIST_LABEL_CLUB = "Verein";
        const LICENSELIST_LABEL_NUMBER = "Lizenz-Nr.";
        const LICENSELIST_LABEL_VALIDUNTIL = "G&uuml;ltig";
        const LICENSELIST_LABEL_LEVEL = "Stufe";
        const LICENSELIST_LABEL_PHONE = self::FUNCTIONARYLIST_LABEL_PHONE;
        const LICENSELIST_LABEL_MOBILE = self::FUNCTIONARYLIST_LABEL_MOBILE;
        const LICENSELIST_LABEL_FAX = self::FUNCTIONARYLIST_LABEL_FAX;
        const LICENSELIST_SEARCH_LEGEND = "Lizenzsuche";
        const LICENSELIST_SEARCH_PERSON_LABEL = "Person";
        const LICENSELIST_SEARCH_PERSON_PLACEHOLDER = self::CLUBLIST_SEARCH_PLACEHOLDER;
        const LICENSELIST_SEARCH_CLUB_LABEL = "Verein";
        const LICENSELIST_SEARCH_CLUB_PLACEHOLDER = self::LICENSELIST_SEARCH_PERSON_PLACEHOLDER;
        const LICENSELIST_SEARCH_LEVEL_LABEL = "Stufe";
        const LICENSELIST_SEARCH_BUTTON = "Lizenzen suchen";
        const LICENSELIST_SEARCH_NOENTRIES = "Es wurden keine passenden Lizenzen gefunden";
        /* ENDREGION LicenseList */
        /* REGION LicenseTable */
        const LICENSETABLE_CAPTION = "Lizenzen";
        const LICENSETABLE_COLUMN_ACRONYM = self::LICENSELIST_LABEL_CLUB;
        const LICENSETABLE_COLUMN_CLUB = self::LICENSETABLE_COLUMN_ACRONYM;
        const LICENSETABLE_COLUMN_PERSONNAME = "Name";
        const LICENSETABLE_COLUMN_NUMBER = self::LICENSELIST_LABEL_NUMBER;
        const LICENSETABLE_COLUMN_VALIDUNTIL = self::LICENSELIST_LABEL_VALIDUNTIL;
        const LICENSETABLE_COLUMN_LEVEL = self::LICENSELIST_LABEL_LEVEL;
        const LICENSETABLE_COLUMN_PHONE = self::LICENSELIST_LABEL_PHONE;
        const LICENSETABLE_COLUMN_MOBILE = self::LICENSELIST_LABEL_MOBILE;
        const LICENSETABLE_COLUMN_FAX = self::LICENSELIST_LABEL_FAX;
        const LICENSETABLE_COLUMN_EMAIL = self::FUNCTIONARYTABLE_COLUMN_EMAIL;
        const LICENSETABLE_SEARCH_LEGEND = self::LICENSELIST_SEARCH_LEGEND;
        const LICENSETABLE_SEARCH_PERSON_LABEL = self::LICENSELIST_SEARCH_PERSON_LABEL;
        const LICENSETABLE_SEARCH_PERSON_PLACEHOLDER = self::LICENSELIST_SEARCH_PERSON_PLACEHOLDER;
        const LICENSETABLE_SEARCH_CLUB_LABEL = self::LICENSELIST_SEARCH_CLUB_LABEL;
        const LICENSETABLE_SEARCH_CLUB_PLACEHOLDER = self::LICENSETABLE_SEARCH_PERSON_PLACEHOLDER;
        const LICENSETABLE_SEARCH_LEVEL_LABEL = "Stufe";
        const LICENSETABLE_SEARCH_BUTTON = self::LICENSELIST_SEARCH_BUTTON;
        const LICENSETABLE_SEARCH_NOENTRIES = self::LICENSELIST_SEARCH_NOENTRIES;
        /* ENDREGION LicenseTable */
        /* REGION Organization */
        const ORGANIZATION_SEPARATOR_PHONE = self::CLUB_SEPARATOR_PHONE;
        const ORGANIZATION_SEPARATOR_MOBILE = self::ORGANIZATION_SEPARATOR_PHONE;
        const ORGANIZATION_SEPARATOR_FAX = self::ORGANIZATION_SEPARATOR_PHONE;
        const ORGANIZATION_SEPARATOR_EMAIL = self::ORGANIZATION_SEPARATOR_PHONE;
        const ORGANIZATION_LABEL_PHONE = self::CLUB_LABEL_PHONE;
        const ORGANIZATION_LABEL_MOBILE = self::CLUB_LABEL_MOBILE;
        const ORGANIZATION_LABEL_FAX = self::CLUB_LABEL_FAX;
        const ORGANIZATION_LABEL_HOMEPAGE = self::CLUB_LABEL_HOMEPAGE;
        /* END REGION Organization */
        /* REGION TeamList */
        const TEAMLIST_NOTCOMPETING = "(aK)";
        const TEAMLIST_HEADLINE_NAME = "Mannschaftsname";
        const TEAMLIST_HEADLINE_CONTACTPEOPLE = "Ansprechpartner";
        const TEAMLIST_LABEL_PHONE = self::ORGANIZATION_LABEL_PHONE;
        const TEAMLIST_LABEL_MOBILE = self::ORGANIZATION_LABEL_MOBILE;
        /* END REGION TeamList */
        /* REGION TeamTable */
        const TEAMTABLE_NOTCOMPETING = self::TEAMLIST_NOTCOMPETING;
        const TEAMTABLE_NOENTRIES = "Keine Mannschaften vorhanden";
        const TEAMTABLE_CAPTION = "Mannschaften";
        const TEAMTABLE_COLUMN_LEAGUE = "Spielklasse";
        const TEAMTABLE_COLUMN_TEAMNAME = "Team";
        const TEAMTABLE_COLUMN_TEAMSHORTNAME = "Team";
        const TEAMTABLE_COLUMN_CONTACT = "Ansprechpartner";
        const TEAMTABLE_COLUMN_PHONE = self::TEAMLIST_LABEL_PHONE;
        const TEAMTABLE_COLUMN_MOBILE = self::TEAMLIST_LABEL_MOBILE;
        const TEAMTABLE_COLUMN_EMAIL = "E-Mail";
        /* END REGION TeamTable */
        /* REGION MatchTable */
        const MATCHTABLE_NOENTRIES = "Aktuell keine Spiele";
        const MATCHTABLE_COLUMN_DATE = "Datum";
        const MATCHTABLE_COLUMN_TIME = "Zeit";
        const MATCHTABLE_COLUMN_LEAGUEACRONYM = "Liga";
        const MATCHTABLE_COLUMN_LEAGUE = "Liga";
        const MATCHTABLE_COLUMN_ID = "Spielnr.";
        const MATCHTABLE_COLUMN_HOMEACRONYM = "Heim";
        const MATCHTABLE_COLUMN_HOME = "Heim";
        const MATCHTABLE_COLUMN_AWAYACRONYM = "Gast";
        const MATCHTABLE_COLUMN_AWAY = "Gast";
        const MATCHTABLE_COLUMN_FIELD = "Ort";
        const MATCHTABLE_COLUMN_UMPIRESELECTIONACRONYM = "UMP";
        const MATCHTABLE_COLUMN_UMPIRESELECTION = "Umpire";
        const MATCHTABLE_COLUMN_UMPIREASSIGNMENTS = "Umpire";
        const MATCHTABLE_COLUMN_SCORERSELECTIONACRONYM = "SCO";
        const MATCHTABLE_COLUMN_SCORERSELECTION = "Scorer";
        const MATCHTABLE_COLUMN_SCORERASSIGNMENTS = "Scorer";
        const MATCHTABLE_COLUMN_RESULT = "Erg.";
        const MATCHTABLE_COLUMN_VALUE_RESULT_PPD = "ppd";
        const MATCHTABLE_COLUMN_SCORESHEET = "Sheet";
        const MATCHTABLE_COLUMN_VALUE_SCORESHEET = self::MATCHTABLE_COLUMN_SCORESHEET;
        /* END REGION MatchTable */
        /* REGION Match */
        const MATCH_LABEL_ID = "Spiel";
        const MATCH_HEADLINE_FIELD = "Spielort";
        const MATCH_HEADLINE_BASIC = "Allgemein";
        const MATCH_HEADLINE_UMPIREASSIGNMENTS = "Umpire-Einteilung";
        const MATCH_HEADLINE_SCORERASSIGNMENTS = "Scorer-Einteilung";
        const MATCH_LABEL_DATE = "Datum";
        const MATCH_LABEL_TIME = self::MATCHTABLE_COLUMN_TIME;
        const MATCH_LABEL_HOME = self::MATCHTABLE_COLUMN_HOME;
        const MATCH_LABEL_AWAY = self::MATCHTABLE_COLUMN_AWAY;
        const MATCH_LABEL_RESULT = "Ergebnis";
        const MATCH_LABEL_SCORESHEET = "Scoresheet";
        const MATCH_VALUE_SCORESHEET = self::MATCH_LABEL_SCORESHEET;
        /* END REGION Match */
        /* REGION Table */
        const TABLE_NOENTRIES = "Keine Tabelle verf&uuml;gbar";
        const TABLE_CAPTION = "Tabelle";
        const TABLE_COLUMN_RANK = "#";
        const TABLE_COLUMN_TEAMNAME = "Team";
        const TABLE_COLUMN_TEAMSHORTNAME = "Team";
        const TABLE_COLUMN_MATCHESCOUNT = "G";
        const TABLE_COLUMN_WINSCOUNT = "W";
        const TABLE_COLUMN_LOSSESCOUNT = "L";
        const TABLE_COLUMN_QUOTA = "PCT";
        const TABLE_COLUMN_GAMESBEHIND = "GB";
        const TABLE_COLUMN_STREAK = "STK";
        /* END REGION Table */
        /* REGION MatchPenaltyTable */
        const MATCHPENALTYTABLE_NOENTRIES = "Keine Strafen vorhanden";
        const MATCHPENALTYTABLE_CAPTION = "Strafen";
        const MATCHPENALTYTABLE_COLUMN_MATCHDATE = "Datum";
        const MATCHPENALTYTABLE_COLUMN_TYPE = "Art";
        const MATCHPENALTYTABLE_COLUMN_LEAGUEACRONYM = "Liga";
        const MATCHPENALTYTABLE_COLUMN_LEAGUE = "Liga";
        const MATCHPENALTYTABLE_COLUMN_MATCHID = "Spielnr.";
        const MATCHPENALTYTABLE_COLUMN_CLUBACRONYM = "Verein";
        const MATCHPENALTYTABLE_COLUMN_CLUB = "Verein";
        const MATCHPENALTYTABLE_COLUMN_NUMBER = "Pass-Nr.";
        const MATCHPENALTYTABLE_COLUMN_FUNCTION = "Funktion";
        const MATCHPENALTYTABLE_COLUMN_INCIDENT = "Grund";
        const MATCHPENALTYTABLE_COLUMN_SENTENCE = "Sperre";
        const MATCHPENALTYTABLE_COLUMN_FEE = "Geldstrafe";
        /* END REGION MatchPenaltyTable */
        /* REGION CourseTable */
        const COURSETABLE_NOENTRIES = "Aktuell werden keine Lehrg&auml;nge angeboten";
        const COURSETABLE_COLUMN_CATEGORY = "Kategorie";
        const COURSETABLE_COLUMN_NAME = "Bezeichnung";
        const COURSETABLE_COLUMN_DATE = "Termin";
        const COURSETABLE_COLUMN_LOCATION = "Lehrgangsort";
        const COURSETABLE_COLUMN_PARTICIPANTS = "Teilnehmer (min/max)";
        const COURSETABLE_COLUMN_REGISTRATIONENDSAT = "Anmeldeschluss";
        const COURSETABLE_COLUMN_VALUE_REGISTRATIONENDSAT = "Keine Anmeldung mehr m&ouml;glich";
        const COURSETABLE_COLUMN_CANCELLATIONENDSAT = "Stornierungsfrist";
        const COURSETABLE_COLUMN_VALUE_CANCELLATIONENDSAT = "Keine Stornierung mehr m&ouml;glich";
        /* END REGION CourseTable */
        /* REGION Course */
        const COURSE_HEADLINE_BASIC = "Allgemeine Informationen";
        const COURSE_LABEL_ORGANIZER_ORGANIZATION = "Verband";
        const COURSE_LABEL_ORGANIZER_CLUB = "Verein";
        const COURSE_LABEL_ORGANIZER = "Ausrichter";
        const COURSE_LABEL_CATEGORY = self::COURSETABLE_COLUMN_CATEGORY;
        const COURSE_LABEL_CODE = "Lehrgangscode";
        const COURSE_LABEL_DESCRIPTION = "Beschreibung";
        const COURSE_LABEL_PARTICIPANTS = self::COURSETABLE_COLUMN_PARTICIPANTS;
        const COURSE_LABEL_REGISTRATIONENDSAT = self::COURSETABLE_COLUMN_REGISTRATIONENDSAT;
        const COURSE_VALUE_REGISTRATIONENDSAT = self::COURSETABLE_COLUMN_VALUE_REGISTRATIONENDSAT;
        const COURSE_LABEL_CANCELLATIONENDSAT = self::COURSETABLE_COLUMN_CANCELLATIONENDSAT;
        const COURSE_VALUE_CANCELLATIONENDSAT = self::COURSETABLE_COLUMN_VALUE_CANCELLATIONENDSAT;
        const COURSE_LABEL_TRAINER = "Ausbilder";
        const COURSE_LABEL_EMAIL = "Bei R&uuml;ckfragen";
        const COURSE_LABEL_COST = "Kosten";
        const COURSE_HEADLINE_SCRIPT = "Skript";
        const COURSE_LABEL_SCRIPTDESCRIPTION = "Bemerkung";
        const COURSE_LABEL_SCRIPTCOST = "Kosten";
        const COURSE_HEADLINE_ACCOMODATION = "&Uuml;bernachtung";
        const COURSE_LABEL_ACCOMODATIONDEADLINE = "Anmeldeschluss";
        const COURSE_VALUE_ACCOMODATIONDEADLINE = "Keine Anmeldung mehr m&ouml;glich";
        const COURSE_LABEL_ACCOMODATIONCOMMENT = "Bemerkung";
        const COURSE_LABEL_ACCOMODATIONCOST = "Kosten";
        const COURSE_HEADLINE_EVENTS = "Termine";
        const COURSE_LABEL_EVENTSDATE = "Termin";
        const COURSE_LABEL_EVENTSLOCATION = "Ort";
        const COURSE_LABEL_EVENTSDESCRIPTION = "Bemerkung";
        /* END REGION Course */
        /* REGION DynamicNavigator */
        const DYNAMICNAVIGATOR_LEGEND = "Navigation";
        const DYNAMICNAVIGATOR_BUTTON = "GO";
        /* END REGION DynamicNavigator */
        /* REGION MatchCalendarCaller */
        const MATCHCALENDARCALLER_TEXT_FEED = "Spielplan als iCal abonnieren";
        const MATCHCALENDARCALLER_TEXT_DOWNLOAD = "Spielplan als iCal herunterladen";
        /* END REGION MatchCalendarCaller */
        /* REGION MatchCalendar */
        const MATCHCALENDAR_NAME = "Spiele als iCal";
        /* END REGION MatchCalendar */
}
?>