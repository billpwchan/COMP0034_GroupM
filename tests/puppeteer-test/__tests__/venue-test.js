/*
 * Copyright (C) UberKidz - All Rights Reserved
 * Unauthorized copying of this file, via any medium is strictly prohibited
 * Proprietary and confidential
 * Written by UberKidz <uberkidz@gmail.com>, 2019
 *
 */

const puppeteer = require('puppeteer');
const HEADLESS = true;
const CUSTOMER_EMAIL = 'customerdemo@mailinator.com';
const CUSTOMER_PASSWORD = '12345678Aa*';

describe('Test UberKidz Venue', () => {
    jest.setTimeout(30000);
    var browser, page;
    var url = 'http://localhost/venues.php';
    let width = 1920;
    let height = 1080;
    beforeEach(async () => {
        browser = await puppeteer.launch({
            headless: HEADLESS
        });
        page = await browser.newPage();
        await page.setViewport({
            width,
            height
        });
    });
    afterEach(() => {
        browser.close()
    });
    test('Title == Venues', async () => {
        await page.goto(url);
        const title = await page.title();
        expect(title).toBe("Venues");
    });
    test("Navbar Exist", async () => {
        await page.goto(url);
        const navbar = await page.$eval(".navbar", el => (el ? true : false));
        expect(navbar).toBe(true);
    });
    test("Need To Login", async () => {
        await page.goto(url);
        const VENUE_SELECTOR = '#product-display > div:nth-child(2) > div > form > div.product-image > a:nth-child(1)';
        await page.click(VENUE_SELECTOR);

        await page.waitForSelector('#datetimepicker');
        const login = await page.$eval('body > main > div.right-column.col-lg-6 > form > div.product-price > a', el => el.innerHTML);
        expect(login.trim()).toBe("You need to Login!");
    });
    test("Add To Cart", async () => {
        await page.goto('http://localhost/login.php');
        const USERNAME_SELECTOR = '#Email';
        const PASSWORD_SELECTOR = '#Password';
        const BUTTON_SELECTOR = '#login-button';
        await page.click(USERNAME_SELECTOR);
        await page.keyboard.type(CUSTOMER_EMAIL);

        await page.click(PASSWORD_SELECTOR);
        await page.keyboard.type(CUSTOMER_PASSWORD);

        await page.click(BUTTON_SELECTOR);
        await page.waitForSelector('#myTabContent');
        const title = await page.title();
        expect(title).toBe("My Account");

        const userDropdown = await page.$eval("#dropdownMenuButton", el => (el ? true : false));
        expect(userDropdown).toBe(true);

        const userType = await page.$eval("#user-type", el => el.innerHTML);
        expect(userType).toContain('Customer');

        const userEmail = await page.$eval("#user-email", el => el.innerHTML);
        expect(userEmail).toBe(CUSTOMER_EMAIL);

        await page.goto(url);
        const VENUE_SELECTOR = '#product-display > div:nth-child(2) > div:nth-child(1) > form > div.product-image > a:nth-child(1)';
        await page.click(VENUE_SELECTOR);
        await page.waitForSelector('#datetimepicker');

        const QUALITY_SELECTOR = 'body > main > div.right-column.col-lg-6 > form > div.product-configuration > div > div.service-choose > button.basic';
        const BOOKING_SELECTOR = '#datetimepicker';
        const LOCATION_SELECTOR = '#pac-input';

        await page.click(QUALITY_SELECTOR);
        await page.click(BOOKING_SELECTOR);
        await page.keyboard.type('2019/05/11 22:00');

        const CART_SELECTOR = 'body > main > div.right-column.col-lg-6 > form > div.product-price > button';
        await page.click(CART_SELECTOR);

        await page.waitForSelector('#swal2-content');

        const pageURL = await page.url();
        expect(pageURL).toContain("duplicateInCart");

        const sa2 = await page.$eval(".swal2-shown", el => (el ? true : false));
        expect(sa2).toBe(true);

        const sa2Content = await page.$eval("#swal2-content", el => el.innerHTML);
        expect(sa2Content.trim()).toBe('The service with specified quality level is already added in your cart');

    });
});