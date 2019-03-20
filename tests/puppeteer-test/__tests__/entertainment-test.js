const puppeteer = require('puppeteer');
const HEADLESS = true;
describe('Test UberKidz Entertainment Package', () => {
    jest.setTimeout(30000);
    var browser, page;
    var url = 'http://localhost/events.php'
    let width = 1920;
    let height = 1080;
    beforeEach(async () => {
        browser = await puppeteer.launch({
            headless: HEADLESS
        });
        page = await browser.newPage();
        await page.setViewport({width, height});
    })
    afterEach(() => {
        browser.close()
    });
    test('Title == Entertainment Packages', async () => {
        await page.goto(url);
        const title = await page.title();
        expect(title).toBe("Entertainment Packages");
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
})