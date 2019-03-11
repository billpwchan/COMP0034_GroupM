const puppeteer = require('puppeteer');
const CREDS = require('./cred.js');
const webPath = 'http://localhost';

async function run() {
    const viewPort = {
        width: 1280,
        height: 960
    };
    const browser = await puppeteer.launch({
        headless: false
    });
    const page = await browser.newPage();
    page.setViewport(viewPort);

    await page.goto(webPath + '/index.php');
    await page.screenshot({
        path: 'screenshots/index.png'
    });

    await page.goto(webPath + '/login.php');
    const USERNAME_SELECTOR = '#Email';
    const PASSWORD_SELECTOR = '#Password';
    const BUTTON_SELECTOR = '#login-button';
    await page.click(USERNAME_SELECTOR);
    await page.keyboard.type(CREDS.username);

    await page.click(PASSWORD_SELECTOR);
    await page.keyboard.type(CREDS.password);

    await page.click(BUTTON_SELECTOR);
    await page.screenshot({
        path: 'screenshots/ServiceProviderAccount.png'
    });

    browser.close();
}

run();