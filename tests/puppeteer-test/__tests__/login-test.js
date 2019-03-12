const puppeteer = require('puppeteer');
const HEADLESS = true;

const CUSTOMER_EMAIL = 'newacc@mailinator.com';
const CUSTOMER_PASSWORD = '12345678Aa*';
const SERVICE_PROVIDER_EMAIL = 'sp@mailinator.com';
const SERVICE_PROVIDER_PASSWORD = '12345678Aa*';

describe('Test Login page', () => {
    var browser, page;
    var url = 'http://localhost/login.php'
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
    test('Title == My Account', async () => {
        await page.goto(url);
        const title = await page.title();
        expect(title).toBe("Login");
    });
    test("Navbar Exist", async () => {
        await page.goto(url);
        const navbar = await page.$eval(".navbar", el => (el ? true : false));
        expect(navbar).toBe(true);
    });
    test("Login Fail Test Invalid Credentials", async () => {
        await page.goto(url);
        const USERNAME_SELECTOR = '#Email';
        const PASSWORD_SELECTOR = '#Password';
        const BUTTON_SELECTOR = '#login-button';
        await page.click(USERNAME_SELECTOR);
        await page.keyboard.type('a@b.com');

        await page.click(PASSWORD_SELECTOR);
        await page.keyboard.type('12345678');

        await page.click(BUTTON_SELECTOR);
        await page.waitForSelector('.navbar');
        const title = await page.title();
        expect(title).toBe("Login");

        const sa2 = await page.$eval(".swal2-shown", el => (el ? true : false));
        expect(sa2).toBe(true);

        const sa2Content = await page.$eval("#swal2-content", el => el.innerHTML);
        expect(sa2Content).toBe('Invalid Credential Provided');
    });
    test("Login Success Test (Service Provider)", async () => {
        await page.goto(url);
        const USERNAME_SELECTOR = '#Email';
        const PASSWORD_SELECTOR = '#Password';
        const BUTTON_SELECTOR = '#login-button';
        await page.click(USERNAME_SELECTOR);
        await page.keyboard.type(SERVICE_PROVIDER_EMAIL);

        await page.click(PASSWORD_SELECTOR);
        await page.keyboard.type(SERVICE_PROVIDER_PASSWORD);

        await page.click(BUTTON_SELECTOR);
        await page.waitForSelector('#myTabContent');
        const title = await page.title();
        expect(title).toBe("My Account");

        const userDropdown = await page.$eval("#dropdownMenuButton", el => (el ? true : false));
        expect(userDropdown).toBe(true);

        const userType = await page.$eval("#user-type", el => el.innerHTML);
        expect(userType).toContain('Service Provider');

        const userEmail = await page.$eval("#user-email", el=>el.innerHTML);
        expect(userEmail).toBe(SERVICE_PROVIDER_EMAIL);
        // browser.close();
    });
    test("Login Success Test (Customer)", async () => {
        await page.goto(url);
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

        const userEmail = await page.$eval("#user-email", el=>el.innerHTML);
        expect(userEmail).toBe(CUSTOMER_EMAIL);
        // browser.close();
    });
})