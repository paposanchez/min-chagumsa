<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class BcsDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $raw = '[["\ud55c\uc2a4\ubaa8\ud130\uc2a4", "\uae40\uc6a9\ud604", "010-9014-2018", "02-451-0788", "\uc11c\uc6b8\uc2dc", "\uac15\ub0a8\uad6c", "\uc11c\uc6b8\uc2dc \uac15\ub0a8\uad6c \uc77c\uc6d0\ub3d9624-3", "mrhans74@naver.com"], ["\ubcf4\uc26c\uce74 \ub178\uc6d0\uc810", "\uc724\uc9c4\uc218", "010-8701-2005", "02-978-3458", "\uc11c\uc6b8\uc2dc", "\ub178\uc6d0\uad6c", "\uc11c\uc6b8\uc2dc \ub178\uc6d0\uad6c \ud558\uacc4\ub3d9 240-19", "blueskyme68@hanmail.net"], ["\uce74\uc11c\ube44\uc2a4 \uac00\ub4e0", "\ubc15\uc131\ub355 \ubd80\uc7a5", "010 4445 4588", "02 401 5152", "\uc11c\uc6b8\uc2dc", "\uc1a1\ud30c\uad6c", "\uc11c\uc6b8\uc2dc \uc1a1\ud30c\uad6c \uac00\ub77d2\ub3d9 193-8", "bcsgd@daum.net"], ["\ub12c\ub9ac_ \uc624\ud1a0\ube0c", "\uae40\uc815\ud68c", "010-9864-8001", "02-999-6582", "\uc11c\uc6b8\uc2dc", "\uac15\ubd81\uad6c", "\uc11c\uc6b8\uc2dc \uac15\ubd81\uad6c \ub178\ud574\ub85c 110-2[\uc218\uc720\ub3d9]", "abcxyz@nully.co.kr"], ["\uc81c\uc774\uc81c\uc774\ubaa8\ud130\uc2a4", "\ubc15\uc7a5\uc120", "010-3316-6409", "032-545-8572", "\uc778\ucc9c\uc2dc", "\uacc4\uc57d\uad6c", "\uc778\ucc9c\uad11\uc5ed\uc2dc \uacc4\uc591\uad6c \uc11c\uc6b4\ub3d9 179", "sunjangpark@naver.com"], ["\ud654\uc774\ud2b8\uc790\ub3d9\ucc28\uc815\ube44", "\uc720\uba85\uc11c", "010-9170-3500", "032-668-3500", "\uacbd\uae30\ub3c4", "\ubd80\ucc9c\uc2dc", "\uacbd\uae30\ub3c4 \ubd80\ucc9c\uc2dc \uc18c\uc0ac\uad6c \uacbd\uc778\ub85c 10\ubc88\uae38 38[\uc1a1\ub0b4\ub3d9]", "y-yooms@hanmail.net"], ["\uc774\ub450\ud76c \ubaa8\ud130\uc2a4", "\uc774\ub450\ud76c", "010-6397-1345", "031) 871 1346", "\uacbd\uae30\ub3c4", "\uc758\uc815\ubd80\uc2dc", "\uacbd\uae30\ub3c4 \uc758\uc815\ubd80\uc2dc \ud638\uc6d0\ub3d9 309-117", "Me0919@hanmail.net"], ["\ub620\ubc29 \uc790\ub3d9\ucc28 \uc815\ube44", "\ucd5c\ub77d\ud6c8", "010-8515-1576", "031-416-9650", "\uacbd\uae30\ub3c4", "\uc548\uc0b0\uc2dc", "\uacbd\uae30\ub3c4 \uc548\uc0b0\uc2dc \uc0c1\ub85d\uad6c \uc774\ub3d9 684-4", "ch1576@nate.com"], ["\uacf5\ub8e1\ubaa8\ud130\uc2a4", "\ubc30\uc0c1\ub960", "010-8665-5282", "031-409-5182", "\uacbd\uae30\ub3c4", "\uc548\uc0b0\uc2dc", "\uacbd\uae30\ub3c4 \uc548\uc0b0\uc2dc \uc0c1\ub85d\uad6c \ubcf8\uc624\ub3d9 834-8", "srbae76@naver.com"], ["\uace8\ub4e0\ubaa8\ud130\uc2a4", "\uae40\ud0dc\uacbd", "010-5319-3802", "031-445-3202", "\uacbd\uae30\ub3c4", "\uc548\uc591\uc2dc", "\uacbd\uae30\ub3c4 \uc548\uc591\uc2dc \ub9cc\uc548\uad6c \uc548\uc5916\ub3d9 508-26", "kimttg@naver.com"], ["\ub3d9\uc131\uce74\uc13c\ud0c0", "\uae40\ubd09\uad6d", "010-8743-2402", "031-974-7600", "\uacbd\uae30\ub3c4", "\uace0\uc591\uc2dc", "\uacbd\uae30\ub3c4 \uace0\uc591\uc2dc \ub355\uc591\uad6c \ud1a0\ub2f9\ub3d9415-4", "st1010kr@naver.com"], ["\uc790\ub3d9\ucc28\uc640 \uc0ac\ub78c\ub4e4", "\uae40\uc9c4\uc775", "010-3727-8722", "031-998-6611", "\uacbd\uae30\ub3c4", "\uae40\ud3ec\uc2dc", "\uacbd\uae30\ub3c4 \uae40\ud3ec\uc2dc \ub300\uacf6\uba74 \ub300\ub2a5\ub9ac2-13", "swcar@naver.com"], ["\ubcf4\uc26c\uce74 \ub2a5\uace1\uc810", "\uc774\ud718\uc131", "010-5393-9001", "031)404-1233", "\uacbd\uae30\ub3c4", "\uc2dc\ud765\uc2dc", "\uacbd\uae30\ub3c4 \uc2dc\ud765\uc2dc \ubaa9\uc2e4\uae38 45 [\ub2a5\uace1\ub3d9]", "calar1@naver.com"], ["\ubcf4\uc26c\uce74\uc11c\ube44\uc2a4 \uc6b4\uc815\uc810", "\uc815\uae30\uc218", "010-4025-2428", "031-947-5115", "\uacbd\uae30\ub3c4", "\ud30c\uc8fc\uc2dc", "\uacbd\uae30\ub3c4 \ud30c\uc8fc\uc2dc \uc2ec\ud559\uc0b0\ub85c423\ubc88\uae38 12-4", "j5030@hanmail.net"], ["\ub9c8\uc774\uce741004", "\ubc15\uc815\ud638", "010-3798-2410", "031 708 8297", "\uacbd\uae30\ub3c4", "\uc131\ub0a8\uc2dc", "\uacbd\uae30\ub3c4 \uc131\ub0a8\uc2dc \ubd84\ub2f9\uad6c \uc57c\ud0d1\ub3d9 527-4", "parkjh002@hanmail.net"], ["\uc0c8\ubcbd\uc744 \uc5ec\ub294 \uc0ac\ub78c\ub4e4", "\uae40\uc131\uad6c", "010-2009-7327", "031-321-1952", "\uacbd\uae30\ub3c4", "\uc6a9\uc778\uc2dc", "\uacbd\uae30\ub3c4 \uc6a9\uc778\uc2dc \ucc98\uc778\uad6c \uc591\uc9c0\uba74 \uc1a1\ubb38\ub9ac 508-7", "doqlek@hanmail.net"], ["\uc911\uc559\ubaa8\ud130\uc2a4", "\uc548\uc218\ubcf5", "010-9010-3657", "031-675-3657", "\uacbd\uae30\ub3c4", "\uc548\uc131\uc2dc", "\uacbd\uae30\ub3c4 \uc548\uc131\uc2dc \ub300\ub355\uba74 \ub0b4\ub9ac 330", "subokahn@hanmail.net"], ["\uadf8\ub9b0\uce74", "\uac15\uc601\uc218", "010-9840-0314", "031-373-8408", "\uacbd\uae30\ub3c4", "\uc624\uc0b0\uc2dc", "\uacbd\uae30\ub3c4 \uc624\uc0b0\uc2dc \uc6d0\ub3d9 765-19", "tank7877@hanmail.net"], ["\ubcf4\uc26c\uce74 \uc758\uc655\uc810", "\uc815\uae30\uc601", "010-3217-0867", "031-453-0333", "\uacbd\uae30\ub3c4", "\uc758\uc655\uc2dc", "\uacbd\uae30\ub3c4 \uc758\uc655\uc2dc \uc655\uace1\ub3d9 597-2", "gdmhs@naver.com"], ["\ub4dc\ub9bc\ubaa8\ud130\uc2a4", "\uae40\ud559\uc120", "010-9424-5178", "031-238-8872", "\uacbd\uae30\ub3c4", "\uc218\uc6d0\uc2dc", "\uc218\uc6d0\uc2dc \uad8c\uc120\uad6c \uace1\ubc18\uc815\ub3d9 610-3", "cheroke3@paran.com"], ["\ub9c8\uc774\uc2a4\ud130 \uc544\uc6b0\ud1a0", "\uc774\uc815\uc6b0", "010-6402-8816", "042-826-8819", "\ub300\uc804\uc2dc", "\uc720\uc131\uad6c", "\ub300\uc804\uc2dc \uc720\uc131\uad6c \uad81\ub3d9 490-18", "powerljw@naver.com"], ["\uc11c\uc0b0\ubcf4\uc26c\uce74\uc11c\ube44\uc2a4", "\uc9c4\uba85\uae30", "010-8823-4766", "041-665-4767", "\ucda9\uccad\ub0a8\ub3c4", "\uc11c\uc0b0\uc2dc", "\ucda9\ub0a8 \uc11c\uc0b0\uc2dc \uc218\uc11d\uc0b0\uc5c5\ub85c 21", "jmkchh@naver.com"], ["\uc624\ud1a0\ub9ac\ub354", "\uc724\uc815\uc6b1", "010-8766-6800", "041-977-5678", "\ucda9\uccad\ub0a8\ub3c4", "\ud64d\uc131\uad70", "\ucda9\uccad\ub0a8\ub3c4 \ud64d\uc131\uad70 \ud64d\uc131\uc74d \ucda9\uc808\ub85c 1031", "yjy756@naver.com"], ["\ubcf4\uc26c\uce74\ub79c\ub4dc", "\ubc15\uc2b9\uaddc", "010-5461-5355", "043-272-5355", "\ucda9\uccad\ubd81\ub3c4", "\uccad\uc8fc\uc2dc", "\ucda9\uccad\ubd81\ub3c4 \uccad\uc8fc\uc2dc \ud765\ub355\uad6c \uc9c1\uc9c0\ub300\ub85c 658", "tt21com@naver.co.kr"], ["\uad70\uc0b0\ub514\uc824\uc13c\ud130(\uad6c \uc720\ub9ac\uce74)", "\uac15\ubcd1\uc218", "010-2958-7228", "063-443-3689", "\uc804\ub77c\ubd81\ub3c4", "\uad70\uc0b0\uc2dc", "\uc804\ubd81 \uad70\uc0b0\uc2dc \ubbf8\uc7a5\ub3d9 381-27", "kbs3689@paran.com"], ["RPM\uce74\uc11c\ube44\uc2a4", "\uc11c\uc7a5\uc6d0", "010-3676-3369", "063-452-4607", "\uc804\ub77c\ubd81\ub3c4", "\uad70\uc0b0\uc2dc", "\uc804\ubd81 \uad70\uc0b0\uc2dc \uac1c\uc815\uba74 \ud1b5\uc0ac\ub9ac 309-2", "rpm4607@nate.com"], ["\uc2a4\ud0c0\uce74 \ud074\ub9ac\ub2c9", "\uae40\ud604\ud64d", "011-9955-0865", "063-467-0865", "\uc804\ub77c\ubd81\ub3c4", "\uad70\uc0b0\uc2dc", "\uc804\ubd81 \uad70\uc0b0\uc2dc \uc694\uc8fd\uc5482\uae38 20", "khh0865@hanmail.net"], ["\ub3c4\ud1b5\uc810", "\uc870\uc9c0\uc6b4", "010-3697-0576", "063-635-7100", "\uc804\ub77c\ubd81\ub3c4", "\ub0a8\uc6d0\uc2dc", "\uc804\ubd81 \ub0a8\uc6d0\uc2dc \ub3c4\ud1b5\ub3d9 30-6", "boschpro@hanmail.net"], ["\uc88b\uc740\ucc28\ub9cc\ub4e4\uae30", "\ud64d\uc131\uc218", "010-8643-7905", "063-636-1342", "\uc804\ub77c\ubd81\ub3c4", "\ub0a8\uc6d0\uc2dc", "\uc804\ubd81 \ub0a8\uc6d0\uc2dc \uc6d4\ub77d\ub3d9 129-90\ubc88\uc9c0", "hongss1363@naver.com"], ["\ub9c8\uc774\uce74\uc11c\ube44\uc2a4", "\uae40\uc885\uc5f0", "010-6608-7503", "063-263-8676", "\uc804\ub77c\ubd81\ub3c4", "\uc644\uc8fc\uad70", "\uc804\ubd81 \uc644\uc8fc\uad70 \uc0bc\ub840\uc74d \uc11d\uc804\ub9ac 179-2", "kim0336@hanmail.net"], ["\uce5c\uad6c\uce74\uc13c\ud0c0", "\uc804\uc885\uc0bc", "010-5651-6950", "063-857-6950", "\uc804\ub77c\ubd81\ub3c4", "\uc775\uc0b0\uc2dc", "\uc804\ubd81 \uc775\uc0b0\uc2dc \uc2e0\ub3d9 767-17", "car6950@hanmail.net"], ["\ubcf4\uc26c\uce74 \uc1a1\ucc9c\uc810", "\uc624\uc815\ub9cc", "010-3684-1874", "063-255-7447", "\uc804\ub77c\ubd81\ub3c4", "\uc804\uc8fc\uc2dc", "\uc804\uc8fc\uc2dc \ub355\uc9c4\uad6c 2\uac00 \uc1a1\ucc9c\ub3d9 835-3", "ojm751205@naver.com"], ["\ud669\uc870\uce74\uc13c\ud0c0", "\ub178\uc7ac\ud604", "010-9028-0388", "063-222-0385", "\uc804\ub77c\ubd81\ub3c4", "\uc804\uc8fc\uc2dc", "\uc804\uc8fc\uc2dc \uc644\uc0b0\uad6c \uc0bc\uccad\ub3d9 \uc0bc\ucc9c\ucc9c\ubcc03\uae38 32-21", "nohjeahyun@naver.com"], ["\ud0b9\uce74\ubaa8\ud130\uc2a4", "\ubb38\uc131\uc9c4", "010-3347-4241", "062-955-4242", "\uad11\uc8fc\uc2dc", "\uad11\uc0b0\uad6c", "\uad11\uc8fc\uad11\uc5ed\uc2dc \uad11\uc0b0\uad6c \uc218\uc644\ub3d91529", "mun-fd@hanmail.net"], ["\ubcf4\uc26c\uce74 \uc218\uc644\uc810", "\uacfd\uc815\ucca0", "010-7421-7700", "062-954-6333", "\uad11\uc8fc\uc2dc", "\uad11\uc0b0\uad6c", "\uad11\uc8fc\uad11\uc5ed\uc2dc \uad11\uc0b0\uad6c \uc7a5\ub355\ub3d9 1419", "boschcar@naver.com"], ["\ub300\uc6b4\ubaa8\ud130\uc2a4", "\uae40\ub300\uc6b4", "010-3646-3622", "062-956-8869", "\uad11\uc8fc\uc2dc", "\uad11\uc0b0\uad6c", "\uad11\uc8fc\uad11\uc5ed\uc2dc \uad11\uc0b0\uad6c \ud558\ub0a8\ub3d9 644", " daewun71@hanmail.net"], ["\uc131\uc2e4\uce74\uc11c\ube44\uc2a4", "\uae40\uc6a9\ubcf5", "010-2625-0865", "062-671-0865", "\uad11\uc8fc\uc2dc", "\uc11c\uad6c", "\uad11\uc8fc\uad11\uc5ed\uc2dc \uc11c\uad6c \uae08\ud638\ub3d9 908", "25426190@hanmail.net"], ["\uc624\uc0ac\uce74 \uc11c\ube44\uc2a4", "\ucd5c\uc601\uaddc", "010-5589-0409", "062-576-1995", "\uad11\uc8fc\uc2dc", "\uc11c\uad6c", "\uad11\uc8fc\uad11\uc5ed\uc2dc \uc11c\uad6c \uc30d\ucd0c\ub3d9 965-21", "dream3902@naver.com"], ["\ubcf4\uc26c\uce74 \uc0c1\ubb34\uc810", "\uae40\uc778\uc131", "010-8624-8579", "062-383-8579", "\uad11\uc8fc\uc2dc", "\uc11c\uad6c", "\uad11\uc8fc\uad11\uc5ed\uc2dc \uc11c\uad6c \ucc9c\ubcc0\uc88c\ud558\ub85c 188", "boschcar7@naver.com"], ["\uae08\uac15\uc790\ub3d9\ucc28 (\ubaa9\ud3ec)", "\uac15\ucd98\uae38", "010-3631-9871", "061-282-7988", "\uc804\ub77c\ub0a8\ub3c4", "\ubaa9\ud3ec\uc2dc", "\uc804\ub0a8 \ubaa9\ud3ec\uc2dc \uc11d\ud604\ub3d9919-4", "kcc5488@naver.com"], ["\ud504\ub85c\uce74\uc13c\ud0c0", "\uc591\uc885\uac11", "010-6854-0687", "061-351-1147", "\uc804\ub77c\ub0a8\ub3c4", "\uc601\uad11\uad70", "\uc804\ub0a8 \uc601\uad11\uad70 \uc601\uad11\uc74d \uc2e0\ud55876-2", "yy0006@hanmail.net"], ["\ud76c\ubd09\uce74\uc13c\ud130", "\uace0\ud76c\ubd09", "010-3639-3456", "064-758-0644", "\uc81c\uc8fc\ub3c4", "\uc81c\uc8fc\uc2dc", "\uc81c\uc8fc\ud2b9\ubcc4\uc790\uce58\ub3c4 \uc81c\uc8fc\uc2dc \uc5f0\uc0bc\ub85c 112-1 (\uc624\ub77c\uc0bc\ub3d9)", "uio3456@naver.com"], ["\uc624\ub108\ub77c\uc778", "\uc724\uae30\uc6d0", "010-3512-7863", "053-384-7863", "\ub300\uad6c\uc2dc", "\ubd80\uad6c", "\ub300\uad6c\uad11\uc5ed\uc2dc \ubd81\uad6c \ud314\ub2ec\ub3d9 33-3", "wgylg@hanmail.net"], ["OK\uce74\ud504\ub77c\uc790", "\uc815\uc7ac\ud615", "010-4511-8506", "054-972-8153", "\uacbd\uc0c1\ubd81\ub3c4", "\uce60\uace1\uad70", "\uacbd\uc0c1\ubd81\ub3c4 \uce60\uace1\uad70 \uc65c\uad00\uc74d \uc65c\uad00\ub9ac 99-24\ubc88\uc9c0", "okcar8506@daum.net"], ["\uacbd\ub0a8\uc815\ube44\uacf5\uc5c5\uc0ac", "\uc815\uc6a9\uad00", "010 2064 8572", "055-281-0113", "\uacbd\uc0c1\ub0a8\ub3c4", "\ucc3d\uc6d0\uc2dc", "\uacbd\ub0a8 \ucc3d\uc6d0\uc2dc \ub0b4\ub3d9 456-15", "knmotors@naver.com"], ["\ubcf4\uc26c\uce74 \uc9c4\ud574\uc911\uc559\uc810(\ucc28\uc564\ucc28\uc0f5)", "\uae40\uc885\uad6d", "010-4100-3735", "055-551-9577", "\uacbd\uc0c1\ub0a8\ub3c4", "\ucc3d\uc6d0\uc2dc", "\uacbd\ub0a8 \ucc3d\uc6d0\uc2dc \uc9c4\ud574\uad6c \uc774\ub3d9 633-7", "babilol@hanmail.net"], ["\ubcf4\uc26c\uc0ac\ucc9c\uc11c\ube44\uc2a4\uc13c\ud130", "\ub2f4\ub2f9:\uae40\uc9c4\uadfc", "010-4845-2662", "055-855-5522", "\uacbd\uc0c1\ub0a8\ub3c4", "\uc0ac\ucc9c\uc2dc", "\uacbd\uc0c1\ub0a8\ub3c4 \uc0ac\ucc9c\uc2dc \uc0ac\ub0a8\uba74 \uacf5\ub2e81\ub85c 82", "tirezone1st@naver.com"], ["\u321c\ubbf8\uc74c\ubcf4\uc26c\uc815\ube44", "\ubc15\uc131\uc885", "010-3581-7686", "051-714-0117", "\ubd80\uc0b0\uc2dc", "\uac15\uc11c\uad6c", "\ubd80\uc0b0\uad11\uc5ed\uc2dc \uac15\uc11c\uad6c \uad6c\ub791\ub3d9 1162-2", "psj7686@hanmail.net"], ["JK\ubaa8\ud130\uc2a4", "\ub178\uc815\uaddc", "010-8558-8213", "051-896-8214", "\ubd80\uc0b0\uc2dc", "\ubd80\uc0b0\uc9c4\uad6c", "\ubd80\uc0b0\uad11\uc5ed\uc2dc \ubd80\uc0b0\uc9c4\uad6c \uac00\uc57c2\ub3d9 644-4", "kue12345@hanmail.net"], ["\ud558\uad6c\uc5b8\uce74 \uc11c\ube44\uc2a4", "\ubc15\ud6c8\uc2dd", "010-3855-5929", "051-205-0799", "\ubd80\uc0b0\uc2dc", "\uc0ac\ud558\uad6c", "\ubd80\uc0b0\uad11\uc5ed\uc2dc \uc0ac\ud558\uad6c \ud558\ub2e8\ub3d9 605-37", "psj7686@hanmail.net"], ["\ubd80\ucc3d\uc790\ub3d9\ucc28\uacf5\uc5c5\uc0ac", "\ubc30\uc0c1\uad6c", "010-9226-7702", "051-754-0770", "\ubd80\uc0b0\uc2dc", "\uc218\uc601\uad6c", "\ubd80\uc0b0\uad11\uc5ed\uc2dc \uc218\uc601\uad6c \uad11\uc5482\ub3d9 190-8", "bae0770@naver.com"], ["\ub3d9\ubd80\uc0b0 \ubd80\uc131\uc790\ub3d9\ucc28\uacf5\uc5c5\uc0ac", "\uae40\uc7ac\ud6c8(\uc544\ub4e4)", "010 9798 5019", "051-543-1835", "\ubd80\uc0b0\uc2dc", "\ud574\uc6b4\ub300\uad6c", "\ubd80\uc0b0\uad11\uc5ed\uc2dc \ud574\uc6b4\ub300\uad6c \ubc18\uc1a12\ub3d9 284", "hun5019@naver.com"], ["\ubcf4\uc26c\uce74 \uac15\ub989\uc810", "\uae40\uc131\uc6b0", "010-7123-5533", "033-642-7501", "\uac15\uc6d0\ub3c4", "\uac15\ub989\uc2dc", "\uac15\uc6d0\ub3c4 \uac15\ub989\uc2dc \ub0b4\uace1\ub3d9 419-7", "w2026@hanmail.net"], ["\ubcf4\uc26c\uce74\uc6d0\uc8fc\uc810", "\uae40\uc885\uc601", "010-9158-0660", "033-732-0889", "\uac15\uc6d0\ub3c4", "\uc6d0\uc8fc\uc2dc", "\uac15\uc6d0\ub3c4 \uc6d0\uc8fc\uc2dc \ud0dc\uc7a5\ub3d9 698-14", "xchicken@hanmail.net"], ["\ubcf4\uc26c\uce74 \ud638\ubc18\uc810", "\uc774\uc5f0\uc8fc", "010-8798-3311", "033-242-3314", "\uac15\uc6d0\ub3c4", "\ucd98\ucc9c\uc2dc", "\uac15\uc6d0\ub3c4 \ucd98\ucc9c\uc2dc \ud1f4\uacc4\ub3d9 381-37", "lyj3311@hanmail.net"]]';
        $json_raw = \GuzzleHttp\json_decode($raw);

        $bcs_raw_data = [];

        foreach($json_raw as $key => $row){
            $k = [
                'users' => ['password' => bcrypt('bcs1234'), 'status_cd' => 1],
                'user_extras' => []];
            foreach ($row as $i => $low) {
                switch($i){
                    case 0:
                        $k['users']['name'] = $low;break;
                    case 1:
                        $k['user_extras']['ceo_name'] = $low;break;
                    case 2:
                        $k['users']['mobile'] = $low;
                        $k['user_extras']['ceo_mobile'] = $low;
                        break;
                    case 3:
                        $k['user_extras']['phone'] = $low;break;
                    case 4:
                        $k['user_extras']['area'] = $low;break;
                    case 5:
                        $k['user_extras']['section'] = $low;break;
                    case 6:
                        $k['user_extras']['address'] = $low;break;
                    case 7:
                        $k['users']['email'] = $low;break;
                }
            }
            $bcs_raw_data[$key] = $k;
        }


        try{
            DB::beginTransaction();

            foreach ($bcs_raw_data as $k => $bcs_data){


                $user_id = DB::table('users')->insertGetId($bcs_data['users']);
                DB::table('role_user')->insert([
                    'user_id' => $user_id,
                    'role_id' => 4
                ]);

                DB::table('role_user')->insert([
                    'user_id' => $user_id,
                    'role_id' => 5
                ]);

                $bcs_data['user_extras']['users_id'] = $user_id;
                DB::table('user_extras')->insert($bcs_data['user_extras']);

                echo $bcs_data['users']['name'].": ".$user_id.PHP_EOL;
            }

            DB:commit();

        }catch (\Exception $e){
            echo "Exception Occured: " . $e->getMessage().PHP_EOL;
            DB::rollback();
        }




    }
}
