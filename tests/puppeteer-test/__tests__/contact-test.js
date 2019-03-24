/*
 * Copyright (C) UberKidz - All Rights Reserved
 * Unauthorized copying of this file, via any medium is strictly prohibited
 * Proprietary and confidential
 * Written by UberKidz <uberkidz@gmail.com>, 2019
 *
 */

const puppeteer = require('puppeteer');
const HEADLESS = true;
describe('Test UberKidz Contact Page', () => {
    jest.setTimeout(30000);
    var browser, page;
    var url = 'http://localhost/contactUs.php';
    let width = 1920;
    let height = 1080;
    beforeEach(async () => {
        browser = await puppeteer.launch({
            headless: HEADLESS
        });
        page = await browser.newPage();
        await page.setViewport({width, height});
    });
    afterEach(() => {
        browser.close()
    });
    test('Title == Contact Us', async () => {
        await page.goto(url);
        const title = await page.title();
        expect(title).toBe("Contact Us");
    });
    test("Navbar Exist", async () => {
        await page.goto(url);
        const navbar = await page.$eval(".navbar", el => (el ? true : false));
        expect(navbar).toBe(true);
    });
    test("Send Message Success Test", async () => {
        await page.goto(url);
        const NAME_SELECTOR = '#name';
        const EMAIL_SELECTOR = '#email';
        const MESSAGE_SELECTOR = '#message';
        const BUTTON_SELECTOR = '#message-button';
        await page.click(NAME_SELECTOR);
        await page.keyboard.type('Sample Name');

        await page.click(EMAIL_SELECTOR);
        await page.keyboard.type('a@b.com');

        await page.click(MESSAGE_SELECTOR);
        await page.keyboard.type('Sample Message');

        await page.click(BUTTON_SELECTOR);
        await page.waitForSelector('#message');

        const title = await page.title();
        expect(title).toBe("Contact Us");

        const pageURL = await page.url();
        expect(pageURL).toContain("success");
    });
});